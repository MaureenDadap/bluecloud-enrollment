<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body>
    @include('student.includes.header')

    <div class="main py-5">
        @yield('content')
    </div>

    @include('includes.footer')

    {{-- Vendor Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
