@extends('layouts.admin')
@section('title', 'Edit Program')
@section('body-title', 'Edit Program')

@section('content')
    <form action="admin/programs/update" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
