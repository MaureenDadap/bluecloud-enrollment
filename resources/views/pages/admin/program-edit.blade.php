@extends('layouts.admin')
@section('title', 'Edit Program')
@section('body-title', 'Edit Program')

@section('content')
    <form action="/admin/programs/update/ {{ $program->id }}" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <label class="form-label"><strong>Program Code:</strong></label>
                        <input type="text" name="code" class="form-control mb-3" value="{{ $program->code }}">

                        <label class="form-label"><strong>Program Name:</strong></label>
                        <input type="text" name="name" class="form-control mb-3" value="{{ $program->name }}">

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
