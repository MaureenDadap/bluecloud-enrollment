<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body>
    @include('includes.navbar')
    @extends('includes.logout_modal')

    <div class="main py-5">
        <div class="container">
            <h2 class="mb-5 body-title text-center">@yield('body-title')</h1>
                @yield('content')
        </div>
    </div>



    @include('includes.footer')



    {{-- Vendor Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
