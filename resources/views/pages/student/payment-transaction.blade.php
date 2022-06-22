@extends('layouts.student')
@section('title', '- Transaction')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow">
                <h5 class="card-header">Transaction</h5>
                <div class="card-body">
                    <div class="p-5">
                        @if ($message = Session::get('error'))
                            <h4 class="text-danger">{{ $message }}</h4>
                        @elseif ($message = Session::get('success'))
                            <h4 class="text-success">{{ $message }}</h4>
                        @endif
                    </div>
                    <a href="/" class="btn btn-primary">Finish</a>
                </div>
            </div>

        </div>
    </div>
@endsection
