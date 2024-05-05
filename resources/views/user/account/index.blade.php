@extends('layout')

@section('css')
    @include('components.user.head')
    <link rel="stylesheet" href="{{ asset('assets/admin/user/style.css') }}">
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.user.script')
    <script src="{{ asset('assets/admin/user/script.js') }}"></script>
@endsection

@section('navbar')
    @include('components.user.navbar')
@endsection

@section('sidebar')
    @include('components.user.sidebar')
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
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.user.update', $auth->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" name="fullname" class="form-control" value="{{ $auth->fullname }}">
                                @if ($errors->has('fullname'))
                                    <span class="error-message">* {{ $errors->first('fullname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="username">Tên tài khoản</label>
                                <input type="text" name="username" class="form-control" value="{{ $auth->username }}">
                                @if ($errors->has('username'))
                                    <span class="error-message">* {{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" value="{{ $auth->email }}">
                                @if ($errors->has('email'))
                                    <span class="error-message">* {{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="text" name="phone" class="form-control" value="{{ $auth->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="error-message">* {{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="phone">Địa chỉ:</label>
                                <input type="text" name="cccd" class="form-control" value="{{ $auth->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="error-message">* {{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="phone">CCCD/CMND:</label>
                                <input type="text" name="cccd" class="form-control" value="{{ $auth->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="error-message">* {{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="phone">Ngày sinh:</label>
                                <input type="text" name="cccd" class="form-control" value="{{ $auth->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="error-message">* {{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="phone">Giới tính:</label>
                                <input type="text" name="cccd" class="form-control" value="{{ $auth->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="error-message">* {{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-success">Xác nhận</button>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="image">Gửi ảnh:</label>
                                <input type="file" name="image" value="{{ $auth->image }}" class="form-control"
                                    accept="image/*" onchange="loadFile(event)">
                                @if ($errors->has('image'))
                                    <span class="error-message">* {{ $errors->first('image') }}</span>
                                @endif
                                <img alt="" src="{{ asset("assets/img/avatar/$auth->image") }}" id="myimage"
                                    width="150" height="150">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
