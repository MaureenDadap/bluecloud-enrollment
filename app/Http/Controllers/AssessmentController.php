<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\Assessment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
            $data = Assessment::all();
            // $query = DB::table('assessments')
            //     ->select(
            //         'assessments.id',
            //         'students.id',
            //         'academic_schedules.id',
            //         'assessments.assessment_id',
            //         'students.last_name',
            //         'academic_schedules.year_start',
            //         'academic_schedules.term',
            //     )
            //     ->leftJoin(
            //         'students',
            //         'assessments.student_id',
            //         '=',
            //         'students.id'
            //     )
            //     ->leftJoin(
            //         'academic_schedules',
            //         'assessments.academic_schedule_id',
            //         '=',
            //         'academic_schedules.id'
            //         )
            //     ->get();

            // $studentIDs = array();
            // $ayIDs = array();

            // foreach ($data as $row) {
            //     array_push($studentIDs, $row->student_id);
            // }

            // foreach ($data as $row) {
            //     array_push($ayIDs, $row->academic_schedule_id);
            // }

            // $students = Student::all()->whereIn('id', $studentIDs);
            // $scheds = AcademicSchedule::all()->whereIn('id', $ayIDs);

            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('last_name', function ($assessment, $student, $sched) {
                //     //$student = $student->where('id', $assessment->student_id)->latest()->first();
                //     return $student['last_name'];
                // })
                // ->addColumn('academic_year', function ($assessment, $student,  $academicSched) {
                //     //$academicSched = $academicSched->where('id', $assessment->academic_schedule_id)->latest()->first();
                //     return $academicSched['year_start'];
                // })
                // ->addColumn('term', function ($assessment, $student, $academicSched) {
                //     //$academicSched = $academicSched->where('id', $assessment->academic_schedule_id)->latest()->first();
                //     return $academicSched['term'];
                // })
                ->addColumn('action', function ($row) {
                    $editRoute = '/admin/programs/edit/' . $row['id'] . '';
                    $deleteRoute = '/admin/programs/delete/  ' . $row['id'] . '';

                    $btn = '<a class="btn btn-info" href="' . $editRoute . '"><i class="bi-pencil text-white"></i></a>
                    <a class="btn btn-danger" href="' . $deleteRoute . '"><i class="bi-trash"></i></a>';

                    return $btn;
                })
                // ->rawColumns(['last_name', 'academic_year', 'term',  'action'])
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
        //
    }
}
