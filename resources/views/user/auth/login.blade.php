<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập tài khoản nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/auth/fonts/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/auth/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/user/auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/auth/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/auth/css/main.css') }}">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('assets/user/auth/images/img-01.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('user.login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Đăng nhập tài khoản
                    </span>
                    <div class="mb-3">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        @if ($errors->has('username'))
                            <span class="error-message">* {{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="error-message">* {{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/user/auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/user/auth/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/user/auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user/auth/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/user/auth/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="js/main.js"></script>
</body>

</html>
