@extends('layout')

@section('css')
    @include('components.admin.head')
    <link rel="stylesheet" href="{{ asset('assets/admin/qrcode/style.css') }}">
    <title>{{ $title }}</title>
    <style>
        .img-user {
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
@endsection

@section('script')
    @include('components.admin.script')
    <script>
        let value = $('.checkbox:checked').length;
        $('#ketQua').val(value);
        $('#select-all').click(function(event) {
            var count = 0;
            if (this.checked) {
                // Iterate each checkbox
                $('.checkbox:checkbox').each(function() {
                    this.checked = true;
                    count++;
                });
            } else {
                $('.checkbox:checkbox').each(function() {
                    this.checked = false;
                });
            }
            $('#ketQua').val(count);
        });

        $('.checkbox').change(function() {
            let countt = $('.checkbox:checked').length;
            $('#ketQua').val(countt);
        });

        function toado() {
            if (navigator.geolocation == false) return;
            navigator.geolocation.getCurrentPosition(hienToaDo);
        }

        function hienToaDo(vitri) {
            console.log(vitri);
            vido = vitri.coords.latitude;
            kinhdo = vitri.coords.longitude;
            document.getElementById("address_latitude").value = vido.toFixed(3);
            document.getElementById("address_longitude").value = kinhdo.toFixed(3);
        }
    </script>

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.qrcode.index') }}">QL mã chấm công</a></li>
                            <li class="breadcrumb-item">Cập nhật</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.qrcode.update', $qrcode->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên nhóm</label>
                                <input type="text" name="name" value="{{ $qrcode->name }}" id="name"
                                    class="form-control">
                                @if ($errors->has('name'))
                                    <span class="error-message">* {{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Địa điểm làm:</label>
                                <input type="text" value="{{ $qrcode->address }}" name="address" class="form-control">
                                @if ($errors->has('address'))
                                    <span class="error-message">* {{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Tọa độ:</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="address_latitude"
                                            value="{{ $qrcode->address_latitude }}" id="address_latitude" readonly
                                            class="form-control" placeholder="Vĩ độ">
                                        @if ($errors->has('address_latitude'))
                                            <span class="error-message">* {{ $errors->first('address_latitude') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="address_longitude"
                                            value="{{ $qrcode->address_longitude }}" id="address_longitude" readonly
                                            class="form-control" placeholder="Kinh độ">
                                        @if ($errors->has('address_longitude'))
                                            <span class="error-message">* {{ $errors->first('address_longitude') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary" onclick="toado()">Lấy tọa độ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mode">Cài đặt chế độ xác nhận:</label>
                                <select name="mode" id="mode" class="form-control">
                                    <option value="1"
                                        @if ($qrcode->mode == 1) @selected(true) @endif>Đăng nhập
                                    </option>
                                    <option value="2"
                                        @if ($qrcode->mode == 2) @selected(true) @endif>Đăng nhập,
                                        chụp ảnh</option>
                                </select>
                                @if ($errors->has('mode'))
                                    <span class="error-message">* {{ $errors->first('mode') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="number">Sô lượng nhân viên:</label>
                                <input type="text" name="number" id="ketQua" readonly value="0"
                                    class="form-control">
                                @if ($errors->has('number'))
                                    <span class="error-message">* {{ $errors->first('number') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="card" style="height: 300px;">
                                <div class="card-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>Ảnh</th>
                                                <th>Họ và tên</th>
                                                <th>Tài khoản</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <input @if ($user->qrcodes->contains('id', $qrcode->id)) checked @endif
                                                            type="checkbox" name="users[]" value="{{ $user->id }}"
                                                            class="checkbox">
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset("assets/img/avatar/$user->image") }}"
                                                            class="img-user" width="50" height="50" alt="">
                                                    </td>
                                                    <td>{{ $user->fullname }}</td>
                                                    <td>{{ $user->username }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <a href="{{ route('admin.qrcode.index') }}" class="btn btn-dark">Quay lại</a>
                            <button type="submit" class="btn btn-success">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
