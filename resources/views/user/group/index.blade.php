@extends('layout')

@section('css')
    @include('components.user.head')
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.user.script')
@endsection


@section('navbar')
    @include('components.user.navbar')
@endsection

@section('sidebar')
    @include('components.user.sidebar')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class=" table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên nhóm</th>
                                            <th>Chế độ</th>
                                            <th>Địa điểm</th>
                                            <th>QR code</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($qrcodes as $qrcode)
                                            <tr>
                                                <td>{{ $loop->iteration }}
                                                <td>{{ $qrcode->name }}</td>
                                                <td>{{ $qrcode->modeName($qrcode->mode) }}</td>
                                                <td>{{ $qrcode->address }}</td>
                                                <td>
                                                    <img src="data:image/png;base64, {!! base64_encode(
                                                        QrCode::format('png')->size(200)->errorCorrection('H')->generate($qrcode->qr_code),
                                                    ) !!} ">

                                                </td>
                                                <td>
                                                    <a href="data:image/png;base64, {!! base64_encode(
                                                        QrCode::format('png')->size(200)->errorCorrection('H')->generate($qrcode->qr_code),
                                                    ) !!}"
                                                        class="btn btn-danger" download><i
                                                            class="fa-solid fa-download"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->



    <!-- /.control-sidebar -->
    </div>
@endsection
