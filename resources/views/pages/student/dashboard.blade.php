@extends('layouts.student')
@section('title', '- Dashboard')
@section('body-title', 'Dashboard')
@section('content')
    <div class="dashboard row justify-content-center gy-4">
        <div class="col-md-6 col-lg-4">
            <a href="/student/online-enrollment">
                <div class="card rounded p-4 enroll">
                    <div>
                        <h4>Online Enrollment</h4>
                        <p>Includes processes from online registration of classes to payment method</p>
                    </div>
                    <i class="bi-credit-card-fill"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="/student/profile">
                <div class="card rounded p-4 ledger">
                    <div>
                        <h4>My Profile</h4>
                        <p>View my account information, edit my profile picture, and see list of courses enrolled.</p>
                    </div>
                    <i class="bi-person-fill"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="dashboard row justify-content-center mt-3 gy-4">
        <div class="col-md-6 col-lg-4">
            <a href="/student/cor">
                <div class="card rounded p-4 cor">
                    <div>
                        <h4>View Certificate of Registration</h4>
                        <p>Generate and issue certificate of enrollment</p>
                    </div>
                    <i class="bi-file-earmark"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="/student/clearance">
                <div class="card rounded p-4 clearance">
                    <div>
                        <h4>My Clearance Information</h4>
                        <p>View and settle your accountabilities and clearance issues in each department</p>
                    </div>
                    <i class="bi-check-circle"></i>
                </div>
            </a>
        </div>
    </div>
@endsection
