@extends('layout')

@section('css')
    @include('components.user.head')
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.user.script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

        });

        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('.checkboxe1s');

            checkboxes.forEach(function(checkbox, index) {
                checkbox.addEventListener('change', function() {
                    // Lấy giá trị của checkbox được chọn
                    var checkboxValue = this.checked ? 1 : 0;

                    // Đặt giá trị của input hidden tương ứng thành giá trị của checkbox
                    document.getElementById('hidden-input-1-' + index).value = checkboxValue;
                });
            });
            var checkboxes = document.querySelectorAll('.checkboxe2s');

            checkboxes.forEach(function(checkbox, index) {
                checkbox.addEventListener('change', function() {
                    // Lấy giá trị của checkbox được chọn
                    var checkboxValue = this.checked ? 1 : 0;

                    // Đặt giá trị của input hidden tương ứng thành giá trị của checkbox
                    document.getElementById('hidden-input-2-' + index).value = checkboxValue;
                });
            });
            var checkboxes = document.querySelectorAll('.checkboxe3s');

            checkboxes.forEach(function(checkbox, index) {
                checkbox.addEventListener('change', function() {
                    // Lấy giá trị của checkbox được chọn
                    var checkboxValue = this.checked ? 1 : 0;

                    // Đặt giá trị của input hidden tương ứng thành giá trị của checkbox
                    document.getElementById('hidden-input-3-' + index).value = checkboxValue;
                });
            });
        });
    </script>
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
                            <li class="breadcrumb-item">Lịch</li>
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <p>Đã đăng ký lịch của tuần này!</p>
            </div>
        </section>
    </div>



    <!-- /.control-sidebar -->
    </div>
@endsection
