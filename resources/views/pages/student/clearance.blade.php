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
                    <img class="student-pic" src="../img/user.png" alt="user image">
                </div>
                <div class="col-md-9">
                    <p><strong>Student ID:</strong> Lorem ipsum</p>
                    <p><strong>Student Name:</strong> Lorem ipsum</p>
                    <p><strong>Student Program:</strong> Lorem ipsum</p>
                </div>
            </div>
            <hr>
            <div class="alert alert-success">
                No pending accountabilities.
            </div>
        </div>
    </div>


@endsection
