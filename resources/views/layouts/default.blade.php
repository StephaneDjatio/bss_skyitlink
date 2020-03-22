<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@yield('styles')
@include('layouts.main_header')
<body>
    <section id="container" class="">
        @include('layouts.topBar')
        @include('layouts.sideBar')
        @yield('css')
        <!--main content start-->
        <section id="main-content1">
            <section class="wrapper">
                @yield('content')
            </section>
        </section>
        @include('layouts.footer')
        @yield('scripts')
    </section>
</body>
</html>

