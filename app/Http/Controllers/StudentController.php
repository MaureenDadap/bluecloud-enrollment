<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->account_type == "student") {
            return view('pages.student.dashboard');
        }

        return redirect("/");
    }

    public function profile()
    {
        return view('pages.student.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'first_name' => 'required',
            'first_name' => 'required',
            'birthdate' => 'required',
            'program' => 'required',
            'year' => 'required'
        ]);

        $student = new Student([
            'last_name' => $request->get('last_name'),
            'first_name' => $request->get('first_name'),
            'birthdate' => $request->get('birthdate'),
            'program' => $request->get('program'),
            'year' => $request->get('year'),
        ]);

        $student->save();
        return redirect('student')->with('success', 'Student has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.view', compact('student'));
    }


    // ADMIN

    public function showApplicants()
    {
        $students = Student::all()->where('application_status', 0);
        return view('pages.admin.new-enrollees', compact('students', 'students'));
    }

    public function showAllStudents()
    {
        $students = Student::all()->where('application_status', 1);
        return view('pages.admin.students', compact('students', 'students'));
    }

    public function acceptStudent($id)
    {
        $student = Student::find($id);
        $student->application_status = 1;

        $student->update();

        return redirect('/admin/new-enrollees')->with('success', 'Student application has been accepted');
    }

    public function showForAdmin($id)
    {
        $student = Student::find($id);
        return view('pages.admin.student-view', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function editForAdmin($id)
    {
        $student = Student::find($id);
        $programs = Program::all();
        return view('pages.admin.student-edit', compact('student', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function updateForAdmin(Request $request, $id)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'birthdate' => 'required|before:today',
            'program' => 'required',
            'year' => 'required',
        ]);

        $student = Student::find($id);
        $student->last_name = $request->get('last_name');
        $student->first_name = $request->get('first_name');
        $student->birthdate = $request->get('birthdate');
        $student->program = $request->get('program');
        $student->year = $request->get('year');

        $student->update();

        return redirect('admin/students/view/' . $id)->with('success', 'Student details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/admin/students')->with('success', 'Student deleted successfully');
    }
}
