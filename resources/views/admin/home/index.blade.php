@extends('layout')

@section('css')
    @include('components.admin.head')
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.admin.script')
    {{-- <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/dist/js/demo.js') }}"></script> --}}
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
                        <h1 class="m-0">Trang chủ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$datas["position"]}}</h3>

                                <p>Chức vụ</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-podcast"></i>
                            </div>
                            <a href="{{ route('admin.position.index') }}" class="small-box-footer">Chuyển tiếp <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$datas["usercount"]}}</h3>

                                <p>Nhân viên</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.user.index') }}" class="small-box-footer">Chuyển tiếp <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$datas["qrcode"]}}</h3>

                                <p>Nhóm mã QR</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-qrcode"></i>
                            </div>
                            <a href="{{ route('admin.qrcode.index') }}" class="small-box-footer">Chuyển tiếp <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$datas["calendar"]}}</h3>

                                <p>Lịch làm đã tạo</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <a href="{{ route('admin.calendar.index') }}" class="small-box-footer">Chuyển tiếp<i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
