@extends('layout')

@section('css')
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        function printElement(elementId) {
            var printContent = document.getElementById(elementId);
            var originalContent = document.body.innerHTML;

            // Đặt nội dung của phần muốn in
            document.body.innerHTML = printContent.innerHTML;

            // Thực hiện in
            window.print();

            // Khôi phục nội dung gốc sau khi in xong
            document.body.innerHTML = originalContent;
        }
    </script>
@endsection


@section('nav')
    @include('components.nav')
@endsection

@section('navbar')
    @include('components.navbar')
@endsection


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mx-3">
                    <div class="col-sm-6">
                        <h1>Quản lý nhân viên</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Nhân viên</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            @include('user.profile.save')
        </section>
@endsection
