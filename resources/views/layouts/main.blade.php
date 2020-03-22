<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.main_header')

<body>
    <section id="container" class="">
        @include('layouts.topBar')
        @yield('css')
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>
        </section>
        @include('layouts.footer')
        @yield('scripts')
    </section>
</body>
</html>

