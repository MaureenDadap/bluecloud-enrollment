@extends('layouts.admin')
@section('title', '- Manage New Enrollees')
@section('body-title', 'New Enrollees')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>Student ID</td>
                            <td>Last Name</td>
                            <td>First Name</td>
                            <td>Birthdate</td>
                            <td>Program</td>
                            <td>Year</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->birthdate }}</td>
                                <td>{{ $student->program }}</td>
                                <td>{{ $student->year }}</td>
                                <td>
                                    <form action="{{ route('student.accept', $student->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Accept</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
