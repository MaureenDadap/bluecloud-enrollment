<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\Assessment;
use App\Models\Courses;
use App\Models\StudentCourses;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal;

class PaypalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('pages.student.payment-transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "PHP",
                        "value" => $request->total_price . '.00'
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            //get current AY id
            $academicScheduleID = AcademicSchedule::latest()->first()->id;

            //get student id
            $student_id = session()->get('studentID');

            //get the latest assessment id of courses saved with student_id 
            $assessment_id = StudentCourses::where('student_id', $student_id)->latest()->first()->assessment_id;

            //get all the courses registered with this assessment id
            $student_courses = StudentCourses::all()->where('assessment_id', $assessment_id);
            $course_ids = array();
            foreach ($student_courses as $course) {
                array_push($course_ids, $course->course_id);
            }

            //get course details from Courses table
            $courses = Courses::all()->whereIn('id', $course_ids);

            $total_units = 0;
            foreach ($courses as $course) {
                $total_units += $course->units;
            }

            $unit_price = 200;
            $misc_price = 5000;
            $total_unit_price = $unit_price * $total_units;
            $total_price = $total_unit_price + $misc_price;


            Assessment::create([
                'student_id' => $student_id,
                'assessment_id' => $assessment_id,
                'academic_schedule_id' => $academicScheduleID,
                'total_units' => $total_units,
                'unit_price' => $unit_price,
                'total_unit_price' => $total_unit_price,
                'misc_price' => $misc_price,
                'total_price' => $total_price
            ]);

            return redirect()
                ->route('createTransaction')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
