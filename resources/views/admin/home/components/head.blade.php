<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ isset($title) && !empty($title) ? $title : 'Admin' }}</title>


<link href="{{ asset('assets/css/customize.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

{{-- switch --}}
@if (str_contains(Request::url(), 'admin/user')  )
    <link href="{{ asset('assets/css/plugins/switchery/switchery.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/crud-user.css') }}" rel="stylesheet">
@endif

