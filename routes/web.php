<?php

use App\Http\Controllers\AcademicScheduleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProgramController;
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


// ----------------- 
//   Auth Routes
// ----------------- 
Route::get('/', [UserController::class, 'home']);
Route::get('login', [UserController::class, 'login']);
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
Route::get('register', [UserController::class, 'register']);
Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut']);


// ----------------- 
//   Student Routes
// -----------------
Route::redirect('student', 'student/dashboard');
Route::get('student/dashboard', [StudentController::class, 'index']);


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
Route::redirect('admin', 'admin/dashboard');
Route::get('admin/dashboard', [AdminController::class, 'index']);

//manage new enrollees
Route::get('admin/new-enrollees', [StudentController::class, 'showApplicants']);
Route::post('admin/accepted-enrollee/{id}', [StudentController::class, 'acceptStudent'])->name('student.accept');

//manage students
Route::get('admin/students', [StudentController::class, 'showAllStudents']);
Route::get('admin/students/view', [StudentController::class, 'show']);

//manage programs
Route::get('admin/programs', [ProgramController::class, 'index']);

//manage courses
Route::get('admin/courses', [CoursesController::class, 'index']);

//manage academic schedule
Route::get('admin/academic-schedule', [AcademicScheduleController::class, 'index']);
Route::post('admin/academic-schedule-edit', [AcademicScheduleController::class, 'update'])->name('academic-year.update');
