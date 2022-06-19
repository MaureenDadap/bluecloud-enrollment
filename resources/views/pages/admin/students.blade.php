@extends('layouts.admin')
@section('title', '- Manage Students')
@section('datatables-cdn')
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
@endsection
@section('body-title', 'Students')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Image</td>
                            <td>Student ID</td>
                            <td>Last Name</td>
                            <td>First Name</td>
                            <td>Program</td>
                            <td>Year</td>
                            <td>Term Enrollment Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('datatables-script')
    <script type="text/javascript">
        $(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/admin/students') }}",
                columns: [{
                        "data": 'DT_RowIndex'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'student_id',
                        name: 'student_id'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'program',
                        name: 'program'
                    },
                    {
                        data: 'year',
                        name: 'year'
                    },
                    {
                        data: 'enrollment_status',
                        name: 'enrollment_status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endsection
