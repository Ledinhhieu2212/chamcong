<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng nhập</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/customize.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">

</head>


<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="card" style="width: 400px; margin: 0 auto;">
            <h1 class="text-center mb-2">Đăng nhập</h1>
            <div class="ibox-content">
                <form class="m-t" method="POST" role="form"action="{{ route('login.post') }}">
                    @csrf
                    <div class="form-group">
                        <select name="decentralization" class="cole-admin-user">
                            <option value="user" selected >Nhân viên</option>
                            <option value="admin">Quản lý</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Username or Email"
                            value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="error-message">* {{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="error-message">* {{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>


</html>
