@extends('layout')

@section('css')

@endsection

@section('script')
@endsection

@section('nav')
    @include('components.navAdmin')
@endsection

@section('navbar')
    @include('components.navbarAdmin')
@endsection


@section('content')


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
        </section>
    </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
@endsection
