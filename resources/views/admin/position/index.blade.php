@extends('layout')

@section('css')
@endsection

@section('script')
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mx-3">
                    <div class="col-sm-6">
                        <h1>Quản lý chức vụ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chức vụ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <form method="POST" action=" ">
                <div class="row p-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tên chức vụ</label>
                            <input type="text" name="job" placeholder="Nhập chữ" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Lương cứng</label>
                            <input type="text" pattern="[0-9]*" name="wage" title="Vui lòng chỉ nhập số!"
                                placeholder="Chỉ nhập số" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body  table-responsive p-0" style="height: 500px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id=""></th>
                                        <th>Tên chức vụ</th>
                                        <th>Lương cứng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($positions as $position)
                                        <tr>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td>{{ $position->job }}</td>
                                            <td>{{ $position->wage }}</td>
                                            <td class="text-center">
                                                <a href=""
                                                    class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href=""
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>

        </section>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
@endsection
