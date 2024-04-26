@extends('layout')

@section('css')
    @include('components.admin.head')
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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mx-3">
                    <div class="col-sm-6">
                        <h1>Tạo qrcode chấm công</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Qr code</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content m-4">
            @yield('crud')
            @include('admin.qrcode.table')
        </section>
    </div>
@endsection
