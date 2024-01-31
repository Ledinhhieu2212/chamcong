<!DOCTYPE html>
<html>

<head>
    @include('admin.home.components.head')
</head>
<body>
    <div id="wrapper">
        @include('admin.home.components.nav')

        <div id="page-wrapper" class="gray-bg">
            @include('admin.home.components.navbar')
            @include($template)
        </div>
    </div>
    @include('admin.home.components.script')
</body>

</html>
