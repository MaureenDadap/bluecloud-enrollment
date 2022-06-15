@extends('layouts.admin')
@section('title', '- Manage Students')
@section('body-title', 'Students')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Image</td>
                            <td>Student ID</td>
                            <td>Last Name</td>
                            <td>First Name</td>
                            <td>Birthdate</td>
                            <td>Program</td>
                            <td>Year</td>
                            <td>Enrollment Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><img src="{{ $student->image }}" alt="user pic" class="table-user-pic"></td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->birthdate }}</td>
                                <td>{{ $student->program }}</td>
                                <td>{{ $student->year }}</td>
                                <td>
                                    @if ($student->enrollment_status == 0)
                                        <span>Not Enrolled</span>
                                    @elseif ($student->enrollment_status == 1)
                                        <span class="text-success">Enrolled</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        <a class="btn btn-info" href="{{ route('student.show', $student->id) }}">Show</a>
                                        <a class="btn btn-warning"
                                            href="{{ route('student.edit', $student->id) }}">Edit</a>

                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
