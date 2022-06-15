<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->account_type == "admin") {
            return view('pages.admin.dashboard');
        }

        return redirect("/");
    }
}