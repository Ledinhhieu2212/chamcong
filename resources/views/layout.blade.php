<!DOCTYPE html>
<html>

<head>

    @include('components.head')
    @yield('css')
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
    <div id="wrapper">

        @yield('navbar')
        @yield('nav')
        @yield('content')
    </div>
    @include('components.script')
    @yield('script')
</body>

</html>
