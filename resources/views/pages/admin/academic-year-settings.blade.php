@extends('layouts.admin')
@section('title', '- Academic Year Settings')
@section('body-title', 'Academic Year Settings')

@section('content')
    <form action="{{ route('academic-year.update') }}" method="post">
        @csrf
        <div class="card shadow">
            <h5 class="card-header">
                A.Y. {{ $schedule->year_start . ' - ' . $schedule->year_end }}, Term {{ $schedule->term }}
            </h5>
            <div class="card-body">
                <div class="row g-4 mb-4">
                    <div class="col-auto">
                        <div class="row g-3">
                            <div class="col-auto">
                                <label class="form-control-plaintext">Year Start:</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="year_start" value="{{ $schedule->year_start }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="row g-3">
                            <div class="col-auto">
                                <label class="form-control-plaintext">Year End:</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="year_end" value="{{ $schedule->year_end }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mb-3">
                    <div class="col-auto">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="form-control-plaintext">Term:</label>
                            </div>
                            <div class="col-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="term" value="1"
                                        {{ $schedule->term == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label">1st</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="term" value="2"
                                        {{ $schedule->term == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label">2nd</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="term" value="3"
                                        {{ $schedule->term == 3 ? 'checked' : '' }}>
                                    <label class="form-check-label">3rd</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#confirmModal">Update</button>

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


        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm changes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Are you sure you want to proceed?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary" type="submit" name="submit" value="Confirm"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
