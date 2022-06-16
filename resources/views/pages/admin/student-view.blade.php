@extends('layouts.admin')
@section('title', '- View Student')
@section('body-title', 'View Student')
@section('content')
    <form action="">
        <div class="card shadow">
            <div class="card-body p-5">
                <div class="row g-3">
                    {{-- left pane start --}}
                    <div class="col-xl-3 text-center">
                        @php
                            if ($student->image == null) {
                                $image = '/img/user.png';
                            } else {
                                $image = '/uploads/' . $student->image;
                            }
                        @endphp
                        <img src="{{ $image }}" alt="student image" class="large-profile mb-2">
                        <hr>
                        <h5>Student ID: {{ $student->student_id }}</h5>
                    </div>
                    {{-- right pane start --}}

                    <div class="col-xl-9">
                        {{-- start tab nav --}}
                        <nav>
                            <div class="nav nav-tabs pagination" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-general-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-general" type="button" role="tab" aria-selected="true">General
                                    Information</button>
                                <button class="nav-link" id="nav-courses-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-courses" type="button" role="tab"
                                    aria-selected="false">Courses Enrolled</button>
                            </div>
                        </nav>
                        {{-- end tab nav --}}

                        {{-- start tab content --}}
                        <div class="tab-content" id="nav-tabContent">
                            {{-- start general info tab --}}
                            <div class="tab-pane fade show active" id="nav-general" role="tabpanel" tabindex="0">
                                <div class="m-3">
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" value="{{ $student->last_name }}"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" value="{{ $student->first_name }}"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="form-label">Birthdate</label>
                                            <input type="text" name="birthdate" value="{{ $student->birthdate }}"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-6">
                                            <label class="form-label">Program</label>
                                            <input type="text" name="program" value="{{ $student->program }}"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Year</label>
                                            <input type="text" name="year" value="{{ $student->year }}"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="/admin/students/edit/{{ $student->id }}" class="btn btn-warning"><i
                                            class="bi-pencil"></i> Edit Details</a>
                                </div>
                            </div>
                            {{-- end general info tab --}}

                            {{-- start courses enrolled tab --}}
                            <div class="tab-pane fade" id="nav-courses" role="tabpanel" tabindex="0">

                            </div>
                            {{-- end courses enrolled tab --}}
                        </div>
                        {{-- end tab content --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
