@extends('layouts.student')
@section('title', '- Transaction')
@section('body-title', 'Transaction')

@section('content')
    @if (\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif
@endsection
