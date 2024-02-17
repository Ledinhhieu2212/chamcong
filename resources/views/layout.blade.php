<!DOCTYPE html>
<html>

<head>
    @include('components.head')
    @yield('css')
</head>

<body>
    <div id="wrapper">

        @yield('navbar')
        <div id="page-wrapper" class="gray-bg">
            @yield('nav')
            @yield('content')
        </div>
    </div>
    @include('components.script')
    @yield('script')
</body>

</html>
