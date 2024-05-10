@extends('layout')

@section('css')
    @include('components.admin.head')
    <link rel="stylesheet" href="{{ asset('assets/admin/user/style.css') }}">
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.admin.script')
    <script src="{{ asset('assets/admin/user/script.js') }}"></script>
@endsection

@section('navbar')
    @include('components.admin.navbar')
@endsection

@section('sidebar')
    @include('components.admin.sidebar')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Nhân viên</a></li>
                            <li class="breadcrumb-item">Tạo mới</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}">
                                @if ($errors->has('fullname'))
                                    <span class="error-message">* {{ $errors->first('fullname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="username">Tên tài khoản</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="error-message">* {{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="username">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="error-message">* {{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="username">Nhập lại mật khẩu</label>
                                <input type="password" name="re_password" class="form-control"
                                    value="{{ old('password') }}" >
                                @if ($errors->has('re_password'))
                                    <span class="error-message">* {{ $errors->first('re_password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="error-message">* {{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="job">Công việc:</label>
                                <select name="job" id="" class="form-control">
                                    <option value="">-- Lựa chọn --</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}"
                                            @if (old('job') == $position->id) @selected(true) @endif>
                                            {{ $position->job }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('job'))
                                    <span class="error-message">* {{ $errors->first('job') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">

                                <a href="{{ route('admin.user.index') }}" class="btn btn-dark">Quay lại</a>
                                <button type="submit" class="btn btn-success">Xác nhận</button>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="image">Gửi ảnh:</label>
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                                        accept="image/*" onchange="loadFile(event)">
                                    @if ($errors->has('image'))
                                        <span class="error-message">* {{ $errors->first('image') }}</span>
                                    @endif
                                    <img alt="" src="#" id="myimage" width="150" height="150">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </section>
    </div>
@endsection
