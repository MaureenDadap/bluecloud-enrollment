<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Courses::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('schedule', function ($row) {
                    return $row['days'] . ', ' . date('g:h a', strtotime($row['time_start'])) . ' - ' . date('g:h a', strtotime($row['time_end']));
                })
                ->addColumn('action', function ($row) {
                    $editRoute = '/admin/course/edit/' . $row['id'] . '';
                    $deleteRoute = '/admin/course/delete/ ' . $row['id'] . '';

                    $btn = '<a class="btn btn-info" href="' . $editRoute . '"><i class="bi-pencil text-white"></i></a>
                    <a class="btn btn-danger" href="' . $deleteRoute . '"><i class="bi-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['schedule', 'action'])
                ->make(true);
        }
        return view('pages.admin.courses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        return view('pages.admin.course-new', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:courses',
            'name' => 'required',
            'program_code' => 'required',
            'year' => 'required',
            'instructor' => 'required',
            'days' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'slots' => 'integer|min:0',
            'units' => 'integer|min:1',
        ]);

        $course = new Courses([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'program_code' => $request->get('program_code'),
            'year' => $request->get('year'),
            'instructor' => $request->get('instructor'),
            'days' => implode(' ', (array) $request['days']),
            'time_start' => $request->get('time_start'),
            'time_end' => $request->get('time_end'),
            'slots' => $request->get('slots'),
            'units' => $request->get('units'),
        ]);

        $course->save();
        return redirect('/admin/courses')->with('success', 'Course has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::find($id);
        $programs = Program::all();
        return view('pages.admin.course-edit', compact('course', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'program_code' => 'required',
            'year' => 'required',
            'instructor' => 'required',
            'days' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'slots' => 'integer|min:0',
            'units' => 'integer|min:1',
        ]);

        $course = Courses::find($id);
        $course->code = $request->get('code');
        $course->name = $request->get('name');
        $course->program_code = $request->get('program_code');
        $course->year = $request->get('year');
        $course->instructor = $request->get('instructor');
        $course->days = implode(' ', (array) $request['days']);
        $course->time_start = $request->get('time_start');
        $course->time_end = $request->get('time_end');
        $course->slots = $request->get('slots');
        $course->units = $request->get('units');


        $course->update();
        return redirect('/admin/courses')->with('success', 'Course details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::find($id);
        $course->delete();
        return redirect('/admin/courses')->with('success', 'Course deleted successfully');
    }
}
