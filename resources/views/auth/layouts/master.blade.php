<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    @include('frontend.partials.head')
    @include('frontend.partials.stylesheets') @yield('stylesheets')
</head>

<body class="app flex-row align-items-center">

    <div class="container">

        @yield('main')

    </div>

    @include('frontend.partials.javascripts') @yield('javascripts')

</body>

</html>