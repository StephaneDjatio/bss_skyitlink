<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')

<body class="login-img3-body">
    <div class="container">
        @yield('css')
        @yield('content')
        @include('layouts.footer')
        @yield('scripts')
    </div>
</body>
</html>

