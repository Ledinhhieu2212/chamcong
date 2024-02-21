@extends('layout')


@section('nav')
    @include('admin.components.nav')
@endsection

@section('navbar')
    @include('admin.components.navbar')
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mx-3">
                    <div class="col-sm-6">
                        <h1>Lịch làm</h1>
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
        <section class="content">
            
        </section>
    </div>
@endsection
