@extends('layouts.student')
@section('title', '- Fees Payment')
@section('body-title', 'Fees Payment')

@section('content')
    <form action="{{ route('processTransaction') }}" method="post">
        @csrf
        <div class="row g-3">
            <div class="col-xl-8">
                <div class="card shadow">
                    <h5 class="card-header">Courses to Register</h5>
                    <div class="card-body">
                        <h5 class="mb-3">Assessment ID: #{{ $assessment_id }}</h5>
                        <hr>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Course Code</td>
                                    <td>Course Name</td>
                                    <td>Schedule</td>
                                    <td>Instructor</td>
                                    <td>Units</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $course->code }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td> {{ $course['days'] . ', ' . date('g:h a', strtotime($course['time_start'])) . ' - ' . date('g:h a', strtotime($course['time_end'])) }}
                                        </td>
                                        <td>{{ $course->instructor }}</td>
                                        <td>{{ $course->units }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <h3 class="card-header">Fees Breakdown</h3>
                    <div class="card-body">
                        <h5>Tuition Fee</h5>
                        <div class="row g-3 mb-4 align-items-end ms-2">
                            <span class="col-auto fw-bold">Total Units x Price per unit:</span>
                            <div class="col d-flex align-items-end">{{ $total_units . ' x ' . $unit_price }}
                                <h5 class="mb-0 ms-2"> = {{ $total_unit_price }}</h5>
                            </div>
                        </div>
                        <h5>Miscellaneous Fee</h5>
                        <div class="row g-3 mb-2 align-items-end ms-2">
                            <span class="col-auto fw-bold">Total:</span>
                            <div class="col d-flex align-items-end">{{ $misc_price }} </div>
                        </div>
                        <hr>
                        <h4 class="mb-4">Total: Php {{ $total_price }}</h4>

                        <input type="hidden" name="total_units" value="{{ $total_units }}">
                        <input type="hidden" name="unit_price" value="{{ $unit_price }}">
                        <input type="hidden" name="misc_price" value="{{ $misc_price }}">
                        <input type="hidden" name="total_unit_price" value="{{ $total_unit_price }}">
                        <input type="hidden" name="total_price" value="{{ $total_price }}">
                        <input type="submit" name="submit" value="Pay" class="btn btn-primary w-100">

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            {{ Session::forget('error') }}
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                            {{ Session::forget('success') }}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
