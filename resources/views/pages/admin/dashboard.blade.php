@extends('layouts.admin')
@section('title', '- Admin Dashboard')
@section('body-title', 'Dashboard')

@section('content')
    <div class="row mb-4 g-4">
        <div class="col">
            <div class="card shadow border-left-primary">
                <div class="card-body py-4 px-5">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="text-success fw-bold">NEW APPLICANTS</span>
                            <h1>{{ $newEnrollees }}</h1>
                        </div>
                        <div class="col-auto">
                            <span class="text-gray display-2"><i class="bi-person-bounding-box"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow border-left-primary">
                <div class="card-body py-4 px-5">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="text-primary fw-bold">STUDENTS</span>
                            <h1>{{ $students }}</h1>
                        </div>
                        <div class="col-auto">
                            <span class="text-gray display-2"><i class="bi-people-fill"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 g-4">
        <div class="col">
            <div class="card shadow border-left-primary">
                <div class="card-body py-4 px-5">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="text-primary fw-bold">PROGRAMS</span>
                            <h1>{{ $programs }}</h1>
                        </div>
                        <div class="col-auto">
                            <span class="text-gray display-2"><i class="bi-card-list"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow border-left-primary">
                <div class="card-body py-4 px-5">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="text-primary fw-bold">COURSES</span>
                            <h1>{{ $courses }}</h1>
                        </div>
                        <div class="col-auto">
                            <span class="text-gray display-2"><i class="bi-book"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
