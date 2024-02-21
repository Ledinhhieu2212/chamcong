@extends('layout')

@section('css')
@endsection

@section('script')
@endsection

@section('nav')
    @include('user.components.nav')
@endsection

@section('navbar')
    @include('user.components.navbar')
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
