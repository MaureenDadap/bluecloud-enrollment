<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.login');
});

Route::post('/register', function () {
    return view('pages.student.register');
});


// ----------------- 
//   Admin Routes
// ----------------- 

Route::get('/student/dashboard', function () {
    return view('pages.student.dashboard');
});

Route::get('/student/online-enrollment', function () {
    return view('pages.student.online-enrollment');
});

Route::get('/student/cor', function () {
    return view('pages.student.cor');
});

Route::get('/student/clearance', function () {
    return view('pages.student.clearance');
});

Route::get('/student/payment-ledger', function () {
    return view('pages.student.payment-ledger');
});

Route::get('/student/payment', function () {
    return view('pages.student.payment');
});

Route::redirect('/student', '/student/dashboard');

Route::view('/student/profile', 'pages.student.profile');

// ----------------- 
//   Admin Routes
// ----------------- 
Route::view('/admin/dashboard', 'pages.admin.dashboard');
Route::redirect('/admin', '/admin/dashboard');
