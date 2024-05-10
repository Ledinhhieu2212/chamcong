@extends('layout')

@section('css')
    @include('components.admin.head')
    <title>{{ $title }}</title>
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

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-between">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Các thông báo về trạng thái chấm công</h4>
                                </div>
                                <div class="card-body">
                                    <!-- the events -->
                                    <div id="external-events">
                                        <div class="external-event bg-success">Đúng giờ</div>
                                        <div class="external-event bg-warning">Đến muộn</div>
                                        <div class="external-event bg-purple">Về sớm</div>
                                        <div class="external-event bg-secondary">Nghỉ</div>
                                        <div class="external-event bg-primary">Nghỉ phép</div>
                                        <div class="external-event bg-danger">Nghỉ không phép</div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class="table  text-center table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ảnh</th>
                                            <th>Họ và tên</th>
                                            <th>Chấm công đến</th>
                                            <th>Chấm công về</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <div class="pagination">
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>
@endsection
