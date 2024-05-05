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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.position.index') }}">Chức vụ</a></li>
                        <li class="breadcrumb-item">Sửa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.position.update' , $position->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="job">Tên công việc:</label>
                            <input type="text" name="job" class="form-control" value="{{$position->job }}">
                            @if ($errors->has('job'))
                                <span class="error-message">* {{ $errors->first('job') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <a href="{{ route('admin.position.index') }}" class="btn btn-dark">Quay lại</a>
                        <button type="submit" class="btn btn-success">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
