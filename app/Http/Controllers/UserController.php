<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login()
    {
        return view('pages.auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('student')->withSuccess("Signed In");
        }

        return redirect("login")->withSuccess("Login details are not valid");
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'birthdate' => 'required|before:today',
            'program' => 'required',
            'year' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        $data = $request->only('email', 'username', 'password');
        $data2 = $request->only('last_name', "first_name", 'birthdate', 'program', 'year');
        $check = $this->createUser($data);
        $check2 = $this->createStudent($data2);

        return redirect("student")->withSuccess("Have registered");
    }

    public function createUser(array $data)
    {
        return User::create([
            "email" => $data['email'],
            "username" => $data['username'],
            "password" =>  Hash::make($data['password'])
        ]);
    }

    public function createStudent(array $data)
    {
        $yearStart = '2022';
        $lastId = 0;

        $academicSched = AcademicSchedule::orderBy('id', 'desc')->take(1)->first();
        $lastStudent =  Student::orderBy('id', 'desc')->take(1)->first();

        if ($academicSched != null) {
            $yearStart = $academicSched->year_start;
        }

        if ($lastStudent != null) {
            $lastId = $lastStudent->id;
        }

        $studentID = $yearStart . '-' . ($lastId + 1);


        return Student::create([
            "student_id" => $studentID,
            "last_name" => $data["last_name"],
            "first_name" => $data["first_name"],
            "birthdate" => $data["birthdate"],
            "program" => $data["program"],
            "year" => $data["year"],
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('student');
        }

        return redirect("login")->withSuccess("Not allowed to access");
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect("login");
    }
}
