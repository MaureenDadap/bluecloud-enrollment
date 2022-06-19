@extends('layouts.student')
@section('title', '- Online Enrollment')
@section('body-title', 'Online Enrollment')
@section('paypal-script')
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <h5><i class="bi-info-circle"></i> Student's Information</h5>

            <hr>

            <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
            <p><strong>Student Name:</strong> {{ $student->first_name . ' ' . $student->last_name }}</p>
            <p><strong>Student Program:</strong> {{ $student->program }}</p>
            <p><strong>Student Year Level:</strong> {{ $student->year }}</p>

            <h5 class="mt-5"><i class="bi-calendar3"></i> Class Registration</h5>
            <hr>
            <p><strong>Academic Year:</strong> {{ $schoolSched->year_start . ' - ' . $schoolSched->year_end }}</p>
            <p><strong>School Term:</strong> {{ $schoolSched->term }}</p>

            <div class="card shadow">
                <h5 class="card-header">
                    Course Registration
                </h5>
                <div class="card-body">
                    <form action="{{ route('enrollment.register') }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Course Code</td>
                                    <td>Course Name</td>
                                    <td>Schedule</td>
                                    <td>Instructor</td>
                                    <td>Units</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($courses->isNotEmpty())
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td><input type="checkbox" name="course_ids[]" value="{{ $course->id }}"></td>
                                            {{-- <input type="hidden" name="course_names[]" value="{{ $course->name }}"> --}}
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">

                                            <td>{{ $course->code }}</td>
                                            <td>{{ $course->name }}</td>
                                            <td> {{ $course['days'] . ', ' . date('g:h a', strtotime($course['time_start'])) . ' - ' . date('g:h a', strtotime($course['time_end'])) }}
                                            </td>
                                            <td>{{ $course->instructor }}</td>
                                            <td>{{ $course->units }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="7">No Courses Available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if ($courses->isNotEmpty())
                            <hr>
                            <input type="submit" name="submit" class="btn btn-primary" value="Register">
                        @endif
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3 fade show d-flex justify-content-between">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>


            {{-- <a href="{{ route('enrollment.payment') }}" class="btn btn-success mt-5">Pay Fees</a> --}}
        </div>
    </div>

@endsection
