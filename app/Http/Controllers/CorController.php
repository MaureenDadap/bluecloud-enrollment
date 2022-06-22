<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\Assessment;
use App\Models\Courses;
use App\Models\Student;
use App\Models\StudentCourses;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CorController extends Controller
{
    public function index()
    {
        $student = Student::find(session('studentID'));
        $schedule = AcademicSchedule::all();

        return view('pages.student.cor', compact('student', 'schedule'));
    }

    public function request(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'year' => 'required',
            'term' => 'required',
        ]);

        $student = Student::find($request->id);
        $academicSchedule = AcademicSchedule::where('year_start', $request->year)
            ->where('term', $request->term)
            ->latest()->first();

        if ($academicSchedule != null) {
            $assessment = Assessment::where('student_id', $request->id)->where('academic_schedule_id', $academicSchedule->id)->latest()->first();

            if ($assessment != null) {
                //get all the courses registered with this assessment id
                $student_courses = StudentCourses::all()->where('assessment_id', $assessment->assessment_id);
                $course_ids = array();
                foreach ($student_courses as $course) {
                    array_push($course_ids, $course->course_id);
                }

                //get course details from Courses table
                $courses = Courses::all()->whereIn('id', $course_ids);

                $pdf = PDF::loadView('pages.student.cor-request',  compact('assessment', 'student', 'academicSchedule', 'courses'))->stream();

                // return $pdf->download('COR.pdf');
                return $pdf;
            } else {
                return redirect('/student/cor')->with('error', 'This assessment does not exist');
            }
        } else {
            return redirect('/student/cor')->with('error', 'This assessment does not exist');
        }
    }
}
