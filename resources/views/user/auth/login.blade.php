<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng nhập User</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/customize.css') }}" rel="stylesheet">
</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="card" style="width: 400px; margin: 0 auto;">
            <h1 class="text-center mb-2">Đăng nhập nhân viên</h1>
            <div class="ibox-content">
                <form class="m-t" method="post" role="form" action="{{ route('login.post') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email or Username" />
                        @if ($errors->has('email'))
                            <span class="error-message">* {{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                        @if ($errors->has('password'))
                            <span class="error-message">* {{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="#">
                        <small>Forgot password?</small>
                    </a>

                    <p class="text-muted text-center">
                        <small>Do not have an account?</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
