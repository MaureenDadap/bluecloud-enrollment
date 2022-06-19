@extends('layouts.student')
@section('title', '- Transaction')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow">
                <h5 class="card-header">Transaction</h5>
                <div class="card-body">
                    @include('includes.alert')
                    <a href="/" class="btn btn-primary">Finish</a>
                </div>
            </div>

        </div>
    </div>
@endsection
