@extends('layouts.admin')
@section('title', '- Manage Courses')
@section('datatables-cdn')
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
@endsection

@section('body-title', 'Courses')
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="/admin/course/new" class="btn btn-success mb-2"><i class="bi-plus"></i> Add New Course</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Code</td>
                            <td>Name</td>
                            <td>Program</td>
                            <td>Year</td>
                            <td>Term</td>
                            <td>Schedule</td>
                            <td>Instructor</td>

                            <td>Units</td>
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
                ajax: "{{ url('/admin/courses') }}",
                columns: [{
                        "data": 'DT_RowIndex'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'program_code',
                        name: 'program_code'
                    },
                    {
                        data: 'year',
                        name: 'year'
                    }, 
                    {
                        data: 'term',
                        name: 'term'
                    },
                    {
                        data: 'schedule',
                        name: 'schedule'
                    },
                    {
                        data: 'instructor',
                        name: 'instructor'
                    },
                    {
                        data: 'units',
                        name: 'units'
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
