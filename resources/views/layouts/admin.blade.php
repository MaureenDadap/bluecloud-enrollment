<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body class="admin">
    @extends('includes.logout-modal')

    <div class="wrapper">
        @include('includes.sidepane')
        <div class="main-content">
            @include('includes.navbar-admin')
            <div class="main p-5">
                <div class="container">
                    <h2 class="mb-5 body-title">@yield('body-title')</h1>
                        @include('includes.alert')
                        @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- Vendor Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    {{-- DataTables --}}
    @yield('datatables-script')
</body>

</html>
