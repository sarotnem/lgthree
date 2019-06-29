<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>

    @include('backend.partials.head')
    @include('backend.partials.stylesheets') @yield('stylesheets')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    @include('backend.partials.header')

    <div class="app-body" id="app">

        @include('backend.partials.sidebar')

        <main class="main">

            @yield('main_outside_container_top')

            <div class="container-fluid">
                <div class="animated fadeIn">

                    @yield('main')

                </div>
            </div>

            @yield('main_outside_container_bottom')

        </main>

    </div>

    @include('backend.partials.footer')

    @include('backend.partials.javascripts') @yield('javascripts')

</body>

</html>