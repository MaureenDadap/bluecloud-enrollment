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
Route::get('admin/accepted-enrollee/{id}', [StudentController::class, 'acceptStudent']);

//manage students
Route::get('admin/students', [StudentController::class, 'showAllStudents']);
Route::get('admin/students/view/{id}', [StudentController::class, 'showForAdmin']);
Route::get('admin/students/edit/{id}', [StudentController::class, 'editForAdmin']);
Route::get('admin/students/delete/{id}', [StudentController::class, 'destroy']);
Route::post('admin/students/update/{id}', [StudentController::class, 'updateForAdmin']);

//manage programs
Route::get('admin/programs', [ProgramController::class, 'index']);
Route::get('admin/programs/new', [ProgramController::class, 'create']);
Route::post('admin/programs/created', [ProgramController::class, 'store']);
Route::get('admin/programs/edit/{id}', [ProgramController::class, 'edit']);
Route::post('admin/programs/update/{id}', [ProgramController::class, 'update']);
Route::get('admin/programs/delete/{id}', [ProgramController::class, 'destroy']);

//manage courses
Route::get('admin/courses', [CoursesController::class, 'index']);
Route::get('admin/course/new', [CoursesController::class, 'create']);
Route::post('admin/course/created', [CoursesController::class, 'store']);
Route::get('admin/course/edit/{id}', [CoursesController::class, 'edit']);
Route::post('admin/course/update/{id}', [CoursesController::class, 'update']);
Route::get('admin/course/delete/{id}', [CoursesController::class, 'destroy']);

//manage academic schedule
Route::get('admin/academic-schedule', [AcademicScheduleController::class, 'index']);
Route::post('admin/academic-schedule-edit', [AcademicScheduleController::class, 'update'])->name('academic-year.update');
