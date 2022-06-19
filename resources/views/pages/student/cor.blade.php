@extends('layouts.student')
@section('title', '- COR')
@section('body-title', 'Certificate of Enrollment (COR)')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h5><i class="bi-file-earmark"></i> Generate Form</h5>
            <hr>

            <form action="{{ route('cor.request') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id }}">
                <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
                <p><strong>Student Name:</strong> {{ $student->first_name . ' ' . $student->last_name }}</p>
                <p><strong>Student Program:</strong> {{ $student->program }}</p>
                <p><strong>Student Year Level:</strong> {{ $student->year }}</p>

                <div class="row mb-3 align-items-center">
                    <div class="col-2">
                        <label><strong>School Year:</strong></label>
                    </div>
                    <div class="col-3">
                        <select name="year" class="form-select" required>
                            @foreach ($schedule as $sched)
                                <option value="{{ $sched->year_start }}">{{ $sched->year_start }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-2">
                        <label><strong>School Term:</strong></label>
                    </div>
                    <div class="col form-check">
                        <input type="radio" name="term" value="1" id="1st" required>
                        <label for="1st" class="me-2">1st</label>

                        <input type="radio" name="term" value="2" id="2nd">
                        <label for="2nd" class="me-2">2nd</label>

                        <input type="radio" name="term" value="3" id="3rd">
                        <label for="3rd" class="me-2">3rd</label>
                    </div>
                </div>

                <input type="submit" name="submit" class="btn btn-primary">
            </form>
            <hr>
            @include('includes.alert')
        </div>
    </div>

@endsection
