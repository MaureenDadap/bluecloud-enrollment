<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body>
    <div class="main default">
        {{-- <div class="d-flex justify-content-center py-3">
            <img src="../img/logo-title.png" class="logo" alt="logo">
        </div> --}}

        @yield('content')
    </div>

    @include('includes.footer')

    {{-- Vendor Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
