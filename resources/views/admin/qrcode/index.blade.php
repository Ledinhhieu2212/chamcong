@extends('layout')

@section('css')
    @include('components.admin.head')
    <link rel="stylesheet" href="{{ asset('assets/admin/qrcode/style.css') }}">
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
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.admin.script')
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
    <script src="{{ asset('assets/admin/qrcode/script.js') }}"></script>
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

                    <div class="col-md-12 text-right">
                        <a href="{{ route('admin.qrcode.create') }}" class="btn m-2 btn-secondary">Thêm mới <i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>

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
                                            <th>Thành viên</th>
                                            <th>QR code</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($qrcodes as $qrcode)
                                            <tr>
                                                {{-- <td>{{ ($qrcode->currentPage() - 1) * $qrcode->perPage() + $loop->iteration }} --}}
                                                {{-- </td> --}}
                                                {{-- <td><img src="{{ asset("assets/img/avatar/$qrcodes->qr_code") }}"
                                                        width="50" height="50" alt="" class="img-user-crud">
                                                </td> --}}
                                                <td>{{ ($qrcodes->currentPage() - 1) * $qrcodes->perPage() + $loop->iteration }}
                                                <td>{{ $qrcode->name }}</td>
                                                <td>{{ $qrcode->modeName($qrcode->mode) }}</td>
                                                <td>{{ $qrcode->address }}</td>
                                                <td>{{ $qrcode->CountUser() }}</td>
                                                <td>
                                                    <img src="data:image/png;base64, {!! base64_encode(
                                                        QrCode::format('png')->size(200)->errorCorrection('H')->generate($qrcode->qr_code),
                                                    ) !!} ">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.qrcode.show', $qrcode->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a onclick="openModal('{{ $qrcode->id }}')" class="btn btn-danger"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                    @include('admin.qrcode.desploy')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <div class="pagination">
                            {{ $qrcodes->onEachSide(5)->links() }}
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>
@endsection
