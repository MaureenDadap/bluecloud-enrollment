@extends('layouts.default')
@section('title', '- Login')
@section('body-title', 'Login')

@section('content')
    <form action="" method="POST">
        @csrf
        <section class="gradient-custom-2">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-6">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="p-5">
                                    <h3 class="mb-5 text-primary">Login</h3>

                                    <div class="mb-4 pb-2">
                                        <div class="form-floating">
                                            <input type="text" name="username" class="form-control"
                                                placeholder="Username" />
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class=" mb-4 pb-2">
                                        <div class="form-floating">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" />
                                            <label class="form-label">Password</label>
                                        </div>

                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your
                                            input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="submit" name="submit" class="btn btn-primary btn-lg"
                                        data-mdb-ripple-color="dark" value="Login" />
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
