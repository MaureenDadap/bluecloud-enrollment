@extends('layouts.admin')
@section('title', '- Edit Student')
@section('body-title', 'Edit Student')
@section('content')
    <form action="/admin/students/update/ {{ $student->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow">
            <h5 class="card-header py-3">General Information</h5>
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
                        <img src="{{ $image }}" alt="student image" class="large-profile mb-4">
                        <input type="file" name="image" class="form-control">
                        <hr>
                        <h5>Student ID: {{ $student->student_id }}</h5>
                    </div>


                    {{-- right pane start --}}
                    <div class="col-xl-9">
                        <div class="mx-3">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $student->last_name }}"
                                        class="form-control" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" value="{{ $student->first_name }}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Birthdate</label>
                                    <input type="date" name="birthdate" class="form-control"
                                        value="{{ $student->birthdate }}" />
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-6">
                                    <label class="form-label">Program</label>
                                    <select name="program" class="form-select form-control">
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->name }}"
                                                {{ $student->program == $program->name ? 'selected' : '' }}>
                                                {{ $program->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Year</label>
                                    <select name="year" class="form-select form-control">
                                        <option value="1" {{ $student->year == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $student->year == '1' ? 'selected' : '' }}>2</option>
                                        <option value="2" {{ $student->year == '1' ? 'selected' : '' }}>3</option>
                                        <option value="2" {{ $student->year == '1' ? 'selected' : '' }}>4</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#confirmModal">Update</button>

                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <strong>Whoops!</strong> There were some problems with your
                                    input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm changes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Are you sure you want to proceed?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary" type="submit" name="submit" value="Confirm" />
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
