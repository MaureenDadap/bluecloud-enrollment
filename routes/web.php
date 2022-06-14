<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'login']);


// ----------------- 
//   Student Routes
// ----------------- 

// Route::resource('student', StudentController::class);

//student register
Route::view('/register', 'StudentController@create');

//student dashboard 
Route::get('/student/dashboard', 'StudentController@index');
Route::redirect('/student', '/student/dashboard');


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



Route::view('/student/profile', 'pages.student.profile');

// ----------------- 
//   Admin Routes
// ----------------- 
Route::view('/admin/dashboard', 'pages.admin.dashboard');
Route::redirect('/admin', '/admin/dashboard');
