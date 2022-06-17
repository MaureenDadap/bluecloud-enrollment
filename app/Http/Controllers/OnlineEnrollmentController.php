<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\Assessment;
use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;
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

        return view('pages.student.online-enrollment', compact('student', 'schoolSched', 'courses'));
    }

    public function paymentView(Request $request)
    {
        $request->validate([
            'course_ids' => 'required',
        ]);

        $course_ids = $request->get('course_ids');
        $courses = Courses::all()->whereIn('id', $course_ids);

        $total_units = 0;

        foreach ($courses as $course) {
            $total_units += $course->units;
        }

        $unit_price = 200;
        $misc_price = 5000;
        $total_unit_price = $unit_price * $total_units;
        $total_price = $total_unit_price + $misc_price;

        return view('pages.student.payment', compact('courses', 'total_units', 'unit_price', 'total_unit_price', 'misc_price', 'total_price'));
    }
}
