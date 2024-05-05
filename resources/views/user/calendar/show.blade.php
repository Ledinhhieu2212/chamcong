@extends('layout')

@section('css')
    @include('components.user.head')
    <title>
        {{ $title }}</title>
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
                            <li class="breadcrumb-item">Lịch</li>
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-between">
                    <div class="col-md-9">
                        <form action="{{ route('admin.user.search') }}" method="post">
                            @csrf
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Tìm kiếm tên tài khoản">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
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
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Thành viên</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($calendars as $calendar)
                                            <tr>
                                                <td></td>
                                                <td>{{ $calendar->start_date }}</td>
                                                <td>{{ $calendar->end_date }}</td>
                                                <td>
                                                    @if ($calendar->users() == null)
                                                        Không có nhân viên
                                                    @else
                                                        @foreach ($calendar->users as $user)
                                                            <p> {{ $user->fullname }}</p>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <div class="pagination">
                            {{-- {{ $qrcodes->onEachSide(5)->links() }} --}}
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- /.control-sidebar -->
    </div>
@endsection
