@extends('layouts.admin')
@section('title', 'Edit Course')
@section('body-title', 'Edit Course')
@section('content')
    <form action="/admin/course/update/{{ $course->id }}" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-body">
                <div class="row justify-content-center my-5">
                    <div class="col-xl-6">
                        <div class="row g-3 align-items-center mb-4">
                            <div class="col-auto">
                                <label class="form-label"><strong>Course Code:</strong></label>
                                <input type="text" name="code" class="form-control" value="{{ $course->code }}">
                            </div>
                            <div class="col">
                                <label class="form-label"><strong>Course Name:</strong></label>
                                <input type="text" name="name" class="form-control" value="{{ $course->name }}">
                            </div>
                        </div>
                        <div class="row
                                    g-3 align-items-center mb-4">
                            <div class="col-auto">
                                <label class="form-label"><strong>Program:</strong></label>
                                <select name="program_code" class="form-select form-control">
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->code }}"
                                            {{ $course->program_code == $program->code ? 'selected' : '' }}>
                                            {{ $program->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <label class="form-label"><strong>Year:</strong></label>
                                <select name="year" class="form-select form-control">
                                    <option value="1" {{ $course->year == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $course->year == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $course->year == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $course->year == '4' ? 'selected' : '' }}>4</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label class="form-label"><strong>Term:</strong></label>
                                <select name="term" class="form-select form-control">
                                    <option value="1" {{ $course->term == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $course->term == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $course->term == '3' ? 'selected' : '' }}>3</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label"><strong>Instructor:</strong></label>
                                <input type="text" name="instructor" class="form-control"
                                    value="{{ $course->instructor }}">
                            </div>
                        </div>

                        <label class="form-plaintext mb-2"><strong>Schedule:</strong></label>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col">
                                <label class="form-label me-3">Day: </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="days[]" id="c1"
                                        value="MON" {{ Str::contains($course->days, 'MON') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="c1">MON</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="days[]" id="c2"
                                        value="TUE" {{ Str::contains($course->days, 'TUE') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="c2">TUE</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="days[]" id="c3"
                                        value="WED" {{ Str::contains($course->days, 'WED') ? 'checked' : '' }}>
                                    <label class="form-check-label"for="c3">WED</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="days[]" id="c4"
                                        value="THU" {{ Str::contains($course->days, 'THU') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="c4">THU</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="days[]" id="c5"
                                        value="FRI" {{ Str::contains($course->days, 'FRI') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="c5">FRI</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="days[]" id="c6"
                                        value="SAT" {{ Str::contains($course->days, 'SAT') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="c6">SAT</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-4">
                            <div class="col">
                                <label class="form-label">Time Start:</label>
                                <input type="time" name="time_start" class="form-control"
                                    value="{{ $course->time_start }}">
                            </div>
                            <div class="col">
                                <label class="form-label">Time End:</label>
                                <input type="time" name="time_end" class="form-control"
                                    value="{{ $course->time_end }}">
                            </div>
                        </div>

                        <div class="row
                                    g-3 align-items-center mb-4">
                            <div class="col">
                                <label class="form-label"><strong>Units:</strong></label>
                                <input type="number" name="units" class="form-control" min="1"
                                    value="{{ $course->units }}">
                            </div>
                        </div>
                        <hr>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">

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
    </form>
@endsection
