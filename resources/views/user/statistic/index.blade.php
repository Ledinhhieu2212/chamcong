@extends('layout')

@section('css')
    @include('components.user.head')
    <title>{{ $title }}</title>
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
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('user.salary.search') }}" method="post">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="month" name="date_month" class="form-control">
                            </div>
                        </div>
                        <div class="col-md">
                            <button type="submit" class="btn btn-success">Tìm kiếm</button>
                            <a href="{{ route('user.salary.index') }}" class="btn btn-primary">Reset</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body ">
                                <table id="example2" class=" table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>Tháng</th>
                                            <th>Lương </th>
                                            <th>Thưởng</th>
                                            <th>Phạt</th>
                                            <th>Tổng tháng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salaries as $salary)
                                            <tr>
                                                <td>{{ sprintf('%02d', $salary->month) }}/{{ $salary->year }}</td>
                                                <td>{{ $salary->position->price }}đ</td>
                                                <td>{{ $salary->total + $salary->total * (float) ($salary->reward / 100) }}
                                                </td>
                                                <td>{{ $salary->punish }}đ</td>
                                                <td class="total">{{ $salary->total_all }}đ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>

                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->



    <!-- /.control-sidebar -->
    </div>
@endsection
