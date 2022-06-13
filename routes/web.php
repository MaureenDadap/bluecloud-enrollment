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
    return view('landing');
});

Route::get('/student/dashboard', function () {
    return view('student.pages.dashboard');
});

Route::get('/student/online-enrollment', function () {
    return view('student.pages.online-enrollment');
});

Route::get('/student/cor', function () {
    return view('student.pages.cor');
});

Route::get('/student/clearance', function () {
    return view('student.pages.clearance');
});

Route::get('/student/payment-ledger', function () {
    return view('student.pages.payment-ledger');
});

Route::get('/student/payment', function () {
    return view('student.pages.payment');
}); 
