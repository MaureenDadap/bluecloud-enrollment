@extends('layouts.default')
@section('title', '- Login')
@section('body-title', 'Login')

@section('content')
    <form action="" method="POST">
        @csrf
        <section class="gradient-custom-2">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-6">
                                        <div class="p-5 text-center">
                                            <img src="../img/logo-title.png" alt="logo" class="logo large mb-3">
                                            <p class="lead">Bluecloud Enrollment is a web-based enrollment
                                                application which is a
                                                supplement to the existing information system of NU Laguna.</p>
                                            <a href="/register" class="btn btn-outline-secondary">Register for account instead</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 bg-primary-blue ">
                                        <div class="p-5">
                                            <h2 class="mb-5 text-white">Login</h2>
                                            <div class="mb-4 pb-2">
                                                <div class="form-floating">
                                                    <input type="text" name="username" class="form-control"
                                                        placeholder="Username" />
                                                    <label class="form-label" for="">Username</label>
                                                </div>
                                            </div>

                                            <div class="mb-4 pb-2">
                                                <div class="form-floating">
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Password" />
                                                    <label class="form-label">Password</label>
                                                </div>
                                            </div>

                                            <input type="submit" name="submit" class="btn btn-primary btn-lg"
                                                data-mdb-ripple-color="dark" value="Login" />

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
