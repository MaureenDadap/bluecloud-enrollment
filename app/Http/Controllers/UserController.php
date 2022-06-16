<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\Program;
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
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect("login")->with('error', 'Log in details not valid');
    }

    public function register()
    {
        $programs = Program::all();
        return view('pages.auth.register', compact('programs'));
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
        $userId = $this->createUser($data)->id;
        $data2 = $request->only('last_name', "first_name", 'birthdate', 'program', 'year');
        $check2 = $this->createStudent($data2, $userId);

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

    public function createStudent(array $data, String $userID)
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
            'user_id' => $userID,
            "student_id" => $studentID,
            "last_name" => $data["last_name"],
            "first_name" => $data["first_name"],
            "birthdate" => $data["birthdate"],
            "program" => $data["program"],
            "year" => $data["year"],
        ]);
    }

    public function home()
    {
        if (Auth::check()) {
            $userType = Auth::user()->account_type;
            if ($userType == "student")
                return redirect('student');
            else if ($userType == "admin")
                return redirect('admin');
        }

        return redirect("login");
    }

    public function signOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
