@extends('layouts.student')
@section('title', '- COR')
@section('body-title', 'Certificate of Enrollment (COR)')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h5><i class="bi-file-earmark"></i> Generate Form</h5>
            <hr>

            <form action="">
                <p><strong>Student ID:</strong> Lorem ipsum</p>
                <input type="hidden" name="student_id" value="">

                <p><strong>Student Name:</strong> Lorem ipsum</p>
                <input type="hidden" name="student_name" value="">

                <p><strong>Student Program:</strong> Lorem ipsum</p>
                <input type="hidden" name="student_program" value="">

                <div class="row mb-3 align-items-center">
                    <div class="col-2">
                        <label><strong>School Year:</strong></label>
                    </div>
                    <div class="col-3">
                        <select name="school_year" id="school_year" class="form-select" required>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-2">
                        <label><strong>School Term:</strong></label>
                    </div>
                    <div class="col form-check">
                        <input type="radio" name="school_term" value="1" id="1st" required>
                        <label for="1st" class="me-2">1st</label>

                        <input type="radio" name="school_term" value="2" id="2nd">
                        <label for="2nd" class="me-2">2nd</label>

                        <input type="radio" name="school_term" value="3" id="3rd">
                        <label for="3rd" class="me-2">3rd</label>
                    </div>
                </div>

                <input type="submit" name="submit" class="btn btn-primary">
            </form>
            <hr>
        </div>
    </div>

@endsection
