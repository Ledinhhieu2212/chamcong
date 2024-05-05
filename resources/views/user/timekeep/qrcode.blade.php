@extends('layout')

@section('css')
    @include('components.user.head')
    <title>{{$title}}</title>
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
                            <h1 class="m-0">{{$title}}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
                                <li class="breadcrumb-item">Chấm công</li>
                                <li class="breadcrumb-item">{{$title}}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- /.control-sidebar -->
    </div>
@endsection
