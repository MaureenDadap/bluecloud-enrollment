<?php

use App\Http\Controllers\AcademicScheduleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\OnlineEnrollmentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('signout', [UserController::class, 'signOut']);

// Route::middleware('signed')->group(function () {
Route::get('login', [UserController::class, 'login']);
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
Route::get('register', [UserController::class, 'register']);
Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');
// });


Route::middleware('auth')->group(function () {
    // ----------------- 
    //   Student Routes
    // -----------------
    // Route::middleware('is_student')->prefix('student')->group(function () {
        Route::redirect('student', 'student/dashboard');
        Route::get('student/dashboard', [StudentController::class, 'index']);

        //online enrollment
        Route::get('student/online-enrollment', [OnlineEnrollmentController::class, 'index']);
        Route::post('enrollment/register', [OnlineEnrollmentController::class, 'registerCourses'])->name('enrollment.register');
        Route::get('enrollment/payment', [OnlineEnrollmentController::class, 'paymentView'])->name('enrollment.payment');

        //COR 
        Route::get('student/cor', [CorController::class, 'index']);
        Route::post('student/cor-request', [CorController::class, 'request'])->name('cor.request');

        //cleaarance
        Route::get('student/clearance', [ClearanceController::class, 'studentIndex']);

        //Profile
        Route::get('student/profile', [ProfileController::class, 'index']);
        Route::post('student/profile/edit', [ProfileController::class, 'editProfile']);
    // });

    // ----------------- 
    //   Admin Routes
    // ----------------- 
    // Route::middleware('is_admin')->prefix('admin')->group(function () {
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

        //manage assessments
        Route::get('admin/assessments', [AssessmentController::class, 'index']);
        Route::get('admin/cor-request/{id}', [AssessmentController::class, 'show']);

        //manage academic schedule
        Route::get('admin/academic-schedule', [AcademicScheduleController::class, 'index']);
        Route::post('admin/academic-schedule-edit', [AcademicScheduleController::class, 'store'])->name('academic-year.store');
        // Route::post('admin/academic-schedule-edit', [AcademicScheduleController::class, 'update'])->name('academic-year.update');

        //Manage clearances
        Route::get('admin/clearances', [ClearanceController::class, 'index']);
        Route::get('admin/clearance/new/{id}', [ClearanceController::class, 'create']);
        Route::post('admin/clearance/created', [ClearanceController::class, 'store']);
        Route::get('admin/clearance/edit/{id}', [ClearanceController::class, 'edit']);
        Route::post('admin/clearance/update/{id}', [ClearanceController::class, 'update']);
        Route::get('admin/clearance/delete/{id}', [ClearanceController::class, 'destroy']);
    // });
});

// ----------------- 
//   Payment Routes
// ----------------- 
Route::get('create-transaction', [PaypalController::class, 'createTransaction'])->name('createTransaction');
Route::post('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
