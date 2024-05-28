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
                <form action="{{ route('admin.position.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="name">Tên công việc:</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="error-message">* {{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="price">Lương:</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <span class="error-message">* {{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ route('admin.position.index') }}" class="btn btn-dark">Quay lại</a>
                            <button type="submit" class="btn btn-success">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
