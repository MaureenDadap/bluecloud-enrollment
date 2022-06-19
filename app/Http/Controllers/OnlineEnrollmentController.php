<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\Assessment;
use App\Models\Courses;
use App\Models\Student;
use App\Models\StudentCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OnlineEnrollmentController extends Controller
{
    public function index()
    {
        $student = Student::find(session('studentID'));
        $schoolSched = AcademicSchedule::latest()->first();
        $courses = Courses::all()
            ->where('program_code', $student->program)
            ->where('year', $student->year)
            ->where('term', $schoolSched->term);

        $currentAY = AcademicSchedule::latest()->first()->id;
        $assessment = Assessment::where('student_id', $student->id)->where('academic_schedule_id', $currentAY)->latest()->first();
        if ($assessment != null)
            $isEnrolled = 1;
        else
            $isEnrolled = 0;

        return view('pages.student.online-enrollment', compact('student', 'schoolSched', 'courses', 'isEnrolled'));
    }

    public function registerCourses(Request $request)
    {
        $request->validate([
            'course_ids' => 'required',
        ]);

        $course_ids = $request->get('course_ids');
        $student_id = $request->get('student_id');
        $assessment_id = substr(str_shuffle('0123456789'), 1, 11);

        $courses = Courses::all()->whereIn('id', $course_ids);

        foreach ($courses as $course) {
            StudentCourses::create([
                'student_id' => $student_id,
                'assessment_id' => $assessment_id,
                'course_id' => $course->id,
                'course_name' => $course->name,
            ]);
        }

        return redirect('/enrollment/payment');
    }

    public function paymentView(Request $request)
    {
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

        return view('pages.student.payment', compact('courses', 'total_units', 'unit_price', 'total_unit_price', 'misc_price', 'total_price', 'assessment_id'));
    }
}
