@extends('layouts.admin')
@section('title', 'Add New Program')
@section('body-title', 'Add New Program')
@section('content')
    <form action="/admin/programs/created" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-body">
                <div class="row justify-content-center my-5">
                    <div class="col-lg-5">
                        <label class="form-label"><strong>Program Code:</strong></label>
                        <input type="text" name="code" class="form-control mb-3">

                        <label class="form-label"><strong>Program Name:</strong></label>
                        <input type="text" name="name" class="form-control mb-3">

                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <strong>Whoops!</strong> There were some problems with your
                                input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
