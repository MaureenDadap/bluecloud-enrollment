@extends('layouts.student')
@section('title', '- Clearance')
@section('body-title', 'Clearance')
@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h5><i class="bi-check-circle"></i> Student's Accountabilities</h5>
            <hr>
            <div class="row align-items-center gy-4">
                <div class="col-md-3">
                    @php
                        if ($student->image == null) {
                            $image = '/img/user.png';
                        } else {
                            $image = '/uploads/' . $student->image;
                        }
                    @endphp
                    <img src="{{ $image }}" alt="student image" class="student-pic mb-3">
                </div>
                <div class="col-md-9">
                    <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
                    <p><strong>Student Name:</strong> {{ $student->first_name . ' ' . $student->last_name }}</p>
                    <p><strong>Program:</strong> {{ $student->program }}</p>
                    <p><strong>Year:</strong> {{ $student->year }}</p>
                </div>
            </div>
            <hr>
            <div class="card shadow">
                <h5 class="card-header">Accountabilities</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Office</td>
                                    <td>Remarks</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($notCleared == '1')
                                    @foreach ($clearances as $row)
                                        <tr>
                                            <td>{{ $row->office }}</td>
                                            <td>{{ $row->remarks }}</td>
                                            <td><span class="btn btn-warning">Pending</span></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-success mt-3 fade show  d-flex justify-content-between">
                                                <span><strong>Congratulations.</strong> You don't have any pending
                                                    accountabilities.</span>
                                            </div>

                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
