<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>

    @include('frontend.partials.head')
    @include('frontend.partials.stylesheets') @yield('stylesheets')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    @include('frontend.partials.header')

    <div class="app-body" id="app">

        @include('frontend.partials.sidebar')

        <main class="main">

            @yield('main_outside_container_top')

            <div class="container-fluid">
                <div class="animated fadeIn">

                    @yield('main')

                </div>
            </div>

            @yield('main_outside_container_bottom')

        </main>

        @include('frontend.partials.aside')

    </div>

    @include('frontend.partials.footer') @yield('javascripts')

    @include('frontend.partials.javascripts')

</body>

</html>