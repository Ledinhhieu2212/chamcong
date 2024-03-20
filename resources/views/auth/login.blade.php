<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Đăng nhập</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>


<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <b>Đăng nhập</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                <form class="m-t" method="POST" role="form"action="{{ route('login.post') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="error-message">* {{ $errors->first('email') }}</span>
                    @endif
                    <div class="input-group my-2">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="error-message">* {{ $errors->first('password') }}</span>
                    @endif
                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                    <div class="row py-2">
                        <div class="col-md-12 pb-2">
                            <a href="{{ route('scanner') }}" class="w-100 btn btn-danger">
                                <img src="{{ asset('assets/img/qrcode.svg') }}" width="30" height="30"
                                    alt="" srcset="">
                                Chấm công Qr code</a>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
