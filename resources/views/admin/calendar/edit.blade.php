@extends('layout')

@section('css')
    @include('components.admin.head')
    <title>{{ $title }}</title>
    <style>
        .img-user {
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
    <style>
        .body-delete {
            width: 100%;
            height: 100%;
            display: none;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgb(51, 47, 47, 0.9);
            z-index: 1000000;
        }

        .form-destroy {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 500px;
            transform: translate(-50%, -50%);
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 2;
            overflow: hidden;
        }

        .form-header {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .form-body {
            padding: 20px;
            height: 100px;
        }

        .form-footer {
            padding: 20px;
            text-align: right;
            width: 100%;
        }
    </style>
@endsection

@section('script')
    @include('components.admin.script')
    <script>
        $('#ketQua').val($('.checkbox:checked').length);
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
            let count = $('.checkbox:checked').length;
            $('#ketQua').val(count);
        });
    </script>
    <script>
        function openModal(employeeId) {
            var modal = document.getElementById("deleteModal-" + employeeId);
            modal.style.display = "block";
            document.body.style.overflow = "hidden"; // Disable scrolling on the body
        }

        // Function to close the modal and change CSS
        function closeModal(employeeId) {
            var modal = document.getElementById("deleteModal-" + employeeId);
            modal.style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling on the body
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.calendar.index') }}">Lịch làm</a></li>
                            <li class="breadcrumb-item">Tạo mới</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.calendar.update', $calendar->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row justify-content-around">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startdate">Từ ngày:</label>
                                        <input type="date" name="start_date" id="startdate"
                                            value="{{ \Carbon\Carbon::parse($calendar->start_date)->format('Y-m-d') }}"
                                            class="form-control">

                                        @if ($errors->has('startdate'))
                                            <span class="error-message">* {{ $errors->first('startdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startdate">Đến ngày:</label>
                                        <input type="date" name="end_date" id="startdate"
                                            value="{{ \Carbon\Carbon::parse($calendar->end_date)->format('Y-m-d') }}"
                                            class="form-control">

                                        @if ($errors->has('startdate'))
                                            <span class="error-message">* {{ $errors->first('startdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Sô lượng nhân viên làm:</label>
                                    <input type="text" name="number" readonly id="ketQua" value="0"
                                        class="form-control">
                                    @if ($errors->has('number'))
                                        <span class="error-message">* {{ $errors->first('number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="open_port">Mở cổng thời khóa biểu:</label>
                                    <input type="checkbox" name="open_port"
                                        @if ($calendar->open_port) @checked(true) @endif value="1"
                                        class="form-control">
                                    @if ($errors->has('open_port'))
                                        <span class="error-message">* {{ $errors->first('open_port') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card" style="height: 300px;">
                                <div class="card-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="allcb" id="select-all"></th>
                                                <th>Ảnh</th>
                                                <th>Họ và tên</th>
                                                <th>Tài khoản</th>
                                                {{-- <th>Thời khóa biểu</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <input @if ($user->calendars->contains('id', $calendar->id)) checked @endif
                                                            type="checkbox" name="users[]" value="{{ $user->id }}"
                                                            class="checkbox">
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset("assets/img/avatar/$user->image") }}"
                                                            class="img-user" width="50" height="50" alt="">
                                                    </td>
                                                    <td>{{ $user->fullname }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    {{-- <td><a href="{{ route('admin.calendar.show.detail.user', $user->id) }}" class="btn bg-primary"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                    </td> --}}
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

                            <a href="{{ route('admin.calendar.index') }}" class="btn btn-dark">Quay lại</a>
                            <button type="submit" class="btn btn-success">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
