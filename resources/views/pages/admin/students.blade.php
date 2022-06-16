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
                            <td>Term Enrollment Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($students as $student)
                            @php
                                if ($student->image == null) {
                                    $image = '/img/user.png';
                                } else {
                                    $image = '/uploads/' . $student->image;
                                }
                            @endphp

                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><img src="{{ $image }}" alt="user pic" class="table-user-pic"></td>
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
                                        <a class="btn btn-info"
                                            href="{{ route('admin.student.show', $student->id) }}">View</a>
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
