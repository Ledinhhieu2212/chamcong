@extends('layout')

@section('css')
    @include('components.admin.head')
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.admin.script')
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
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-between">
                    <div class="col-md-9">
                        <form action="{{ route('admin.user.search') }}" method="post">
                            @csrf
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" name="fullname" class="form-control"
                                            placeholder="Tìm kiếm tên nhân viên">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Tìm kiếm tên tài khoản">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 text-right">
                        <a class="btn btn-primary" id="detail_timekeep">
                            Thông tin đánh trạnh thái chấm công
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ảnh</th>
                                            <th>Họ và tên</th>
                                            <th>Chấm công đến</th>
                                            <th>Chấm công về</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <div class="pagination">
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>
@endsection
