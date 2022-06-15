@extends('layouts.default')
@section('title', '- Register')

@section('content')
    <form action="{{ route('register.custom') }}" method="POST">
        @csrf
        <section class="bg-light bg-gradient">

            <div class="container py-5 h-100">
                <div class="text-center mb-5">
                    <img src="../img/logo-title.png" alt="logo" class="logo mb-3">
                    <h1 class="text-center">Enrollment Application</h1>
                </div>

                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <h3 class="mb-5 text-primary">Basic Infomation</h3>

                                            <div class="row">
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" name="first_name"
                                                            class="form-control form-control-lg" placeholder="First Name" />
                                                        <label class="form-label">First name</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" name="last_name"
                                                            class="form-control form-control-lg" placeholder="Last Name" />
                                                        <label class="form-label">Last name</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mb-4 pb-2">
                                                <div class="">
                                                    <label class="form-label" for="">Birthdate</label>
                                                    <input type="date" name="birthdate"
                                                        class="form-control form-control-lg" />
                                                </div>
                                            </div>

                                            <div class="mb-4 pb-2">
                                                <div class="form-floating">
                                                    <input type="text" name="email" class="form-control form-control-lg"
                                                        placeholder="Email address" />
                                                    <label class="form-label">Email address</label>
                                                </div>
                                            </div>

                                            <div class="mb-4 pb-2">
                                                <div class="form-floating">
                                                    <input type="text" name="username" class="form-control form-control-lg"
                                                        placeholder="Username" />
                                                    <label class="form-label" for="">Username</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="password" name="password"
                                                            class="form-control form-control-lg" placeholder="Password" />
                                                        <label class="form-label">Password</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control form-control-lg"
                                                            placeholder="Confirm password" />
                                                        <label class="form-label">Confirm password</label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 bg-primary-blue text-white">
                                        <div class="p-5">
                                            <h3 class="mb-5">Application Details</h3>

                                            <div class="mb-4 pb-2">
                                                <label class="form-label">Program</label>
                                                <select name="program" class="form-select form-control-lg">
                                                    <option value="BS Computer Science" selected>BS Computer Science
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-4 pb-2">
                                                <label class="form-label">Year</label>
                                                <select name="year" class="form-select form-control-lg">
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="2">3</option>
                                                    <option value="2">4</option>
                                                </select>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <input type="submit" name="submit" class="btn btn-primary btn-lg"
                                                    data-mdb-ripple-color="dark" value="Register" />

                                                <a href="login" class="btn btn-lg btn-outline-light">I have an existing
                                                    account</a>
                                            </div>



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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
