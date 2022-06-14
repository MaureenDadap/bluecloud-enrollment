@extends('layouts.student')
@section('title', '- Online Enrollment')
@section('body-title', 'Online Enrollment')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h5><i class="bi-info-circle"></i> Student's Information</h5>

            <hr>

            <p><strong>Student ID:</strong> Lorem ipsum</p>
            <p><strong>Student Name:</strong> Lorem ipsum</p>
            <p><strong>Student Program:</strong> Lorem ipsum</p>
            <p><strong>Student Department:</strong> Lorem ipsum</p>

            <h5 class="mt-5"><i class="bi-calendar3"></i> Class Registration</h5>
            <hr>
            <p><strong>School Year:</strong> Lorem ipsum</p>
            <p><strong>School Term:</strong> Lorem ipsum</p>
            <p><strong>Curriculum Code:</strong> Lorem ipsum</p>

            <form action="">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Course Code</td>
                            <td>Course Name</td>
                            <td>Schedule</td>
                            <td>Slots Available</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>CODE</td>
                            <td>Lorem ipsum</td>
                            <td>Schedule</td>
                            <td>32</td>
                            <td>Unregistered</td>
                        </tr>
                    </tbody>
                </table>

                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Register">
            </form>

            <a href="/student/payment" class="btn btn-success mt-5">Pay Fees</a>
        </div>
    </div>

@endsection
