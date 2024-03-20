<!DOCTYPE html>
<html>

<head>

    @yield('css')
    @include('components.head')
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
    <div id="wrapper">

        @include('components.navbar')
        @include('components.nav')
        @yield('content')
    </div>
    @include('components.script')
    @yield('script')
</body>

</html>
