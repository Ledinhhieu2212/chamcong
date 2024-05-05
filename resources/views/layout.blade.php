<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        @yield('preloader')
        @yield('navbar')
        @yield('sidebar')
        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    @yield('script')
</body>

</html>
