<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\Assessment;
use App\Models\Courses;
use App\Models\Student;
use App\Models\StudentCourses;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;



class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Assessment::select(
                'assessments.id as id',
                'students.student_id as student_id',
                'academic_schedules.id',
                'assessments.assessment_id',
                'students.last_name as last_name',
                'academic_schedules.year_start as academic_year',
                'academic_schedules.term as term',
            )
                ->join(
                    'students',
                    'assessments.student_id',
                    '=',
                    'students.id'
                )
                ->join(
                    'academic_schedules',
                    'assessments.academic_schedule_id',
                    '=',
                    'academic_schedules.id'
                )
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $viewRoute = '/admin/cor-request/' . $row['id'] . '';

                    $btn = '<a class="btn btn-info" href="' . $viewRoute . '" target="_blank"><i class="bi-eye text-white"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.assessments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assessment = Assessment::find($id);
        $student = Student::find($assessment->student_id);
        $academicSchedule = AcademicSchedule::where('id', $assessment->academic_schedule_id)->latest()->first();

        //get all the courses registered with this assessment id
        $student_courses = StudentCourses::all()->where('assessment_id', $assessment->assessment_id);
        $course_ids = array();
        foreach ($student_courses as $course) {
            array_push($course_ids, $course->course_id);
        }

        //get course details from Courses table
        $courses = Courses::all()->whereIn('id', $course_ids);

        $pdf = Pdf::loadView('pages.student.cor-request',  compact('assessment', 'student', 'academicSchedule', 'courses'))->stream();

        return $pdf;
    }
}
