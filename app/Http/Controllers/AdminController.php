<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->account_type == "admin") {

            $newEnrollees = Student::where('application_status', 0)->count();
            $students = Student::where('application_status', 1)->count();
            $programs = Program::all()->count();
            $courses = Courses::all()->count();
            return view('pages.admin.dashboard', compact(['newEnrollees', 'students', 'programs', 'courses']));
        }

        return redirect("/");
    }
}
