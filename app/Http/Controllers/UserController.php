<?php

namespace App\Http\Controllers;

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
            return redirect()->intended('pages.student.dashboard')->withSuccess("Signed In");
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
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess("Have registered");
    }

    public function create(array $data)
    {
        return User::create([
            "email" => $data['email'],
            "username" => $data['username'],
            "password" =>  Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('pages.student.dashboard');
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
