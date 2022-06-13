@extends('student.layouts.default')
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
            <a href="/student/payment-ledger">
                <div class="card rounded p-4 ledger">
                    <div>
                        <h4>Payment Ledger</h4>
                        <p>View my payment transactions with Accounting's office</p>
                    </div>
                    <i class="bi-cash"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="dashboard row justify-content-center mt-4 gy-4">
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
