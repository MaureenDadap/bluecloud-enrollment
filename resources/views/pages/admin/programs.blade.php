@extends('layouts.admin')
@section('title', '- Manage Programs')
@section('datatables-cdn')
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
@endsection

@section('body-title', 'Programs')
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="/admin/programs/new" class="btn btn-success mb-2"><i class="bi-plus"></i> Add New Program</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" width="100%" cellspacing="0" id="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Code</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">Are you sure you want to delete?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" id="deleteBtn" href="#">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-scripts')
    <script>
        var programId;

        $(document).on('click', '.deleteProgram', function() {
            programId = $(this).attr('data-programid');
        });

        $('#deleteBtn').click(function() {
            window.location.href = "/admin/programs/delete/" + programId;
        });
    </script>
@endsection


@section('datatables-script')
    <script type="text/javascript">
        $(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/admin/programs') }}",
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
