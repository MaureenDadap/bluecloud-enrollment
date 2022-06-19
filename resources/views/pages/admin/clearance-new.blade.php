@extends('layouts.admin')
@section('title', 'Add New Accountability')
@section('body-title', 'Add New Accountability')
@section('content')
    <form action="/admin/clearance/created" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-body">
                <div class="row justify-content-center my-5">
                    <div class="col-lg-5">
                        <div class="row g-3">
                            <span><strong>Name:</strong> {{ $student->first_name . ' ' . $student->last_name }}</span>
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            <span><strong>Student ID:</strong> {{ $student->student_id }}</span>
                        </div>
                        <hr>
                        <div class="form-group mb-3">
                            <label class="form-label"><strong>Office:</strong></label>
                            <select name="office" class="form-select form-control">
                                <option value="Registrar">Registrar</option>
                                <option value="Guidance">Guidance</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Student Affairs">Student Affairs</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><strong>Remarks:</strong></label>
                            <select name="remarks" class="form-select form-control" id="remarkSelect">
                                <option value="Unsettled balances">Unsettled balances</option>
                                <option value="Number of attendances">Number of attendances</option>
                                <option value="Academic standing">Academic standing</option>
                                <option value="Disciplinary standing">Disciplinary standing</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 other-remarks">
                            <label class="form-label"><strong>Other Remarks:</strong></label>
                            <textarea name="other-remarks" id="remarks" class="form-control"></textarea>
                        </div>

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

@section('custom-scripts')
    <script>
        $('.other-remarks').hide();
        $("#remarkSelect").change(function() {
            if ($('#remarkSelect').val() == "Other") {
                $('.other-remarks').show();
            } else
            $('.other-remarks').hide();
        });
    </script>
@endsection
