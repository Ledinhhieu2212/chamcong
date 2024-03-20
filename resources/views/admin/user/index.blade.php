@extends('layout')


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
            @yield('crud')
            <form method="get" action="{{ route('admin.user.delete.all') }}">
                @csrf
                <div class="row py-2">
                    <div class="col-md-6">
                        @if (Route::currentRouteName() !== 'admin.user.edit')
                            <button class="btn btn-danger" type="submit">Xóa tất cả nhân viên đã chọn</button>
                        @endif
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body  table-responsive p-0" style="height: 500px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="" id="select_all_ids"></th>
                                            <th>Ảnh</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Công việc</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users_array as $user)
                                            <tr>
                                                <td><input type="checkbox" name="ids[{{ $user->id }}]"
                                                        class="checkbox_ids" value="{{ $user->id }}"></td>
                                                <td>
                                                    <img @if (file_exists(public_path("assets/img/$user->image"))) src="{{ asset("assets/img/$user->image") }}"
                                                @else
                                                    src="{{ $user->image }}" @endif
                                                        class="image-avatar" width="150" height="200"
                                                        alt="Ảnh avatar tài khoản" />
                                                </td>
                                                <td> {{ $user->fullname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->position)
                                                        {{ $user->position->job }}
                                                    @else
                                                        N/A or any default value
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                                        class="btn btn-success"><i class="fa fa-edit"></i></a>

                                                    @if (Route::currentRouteName() !== 'admin.user.edit')
                                                        <a href="{{ route('admin.user.destroy', $user->id) }}"
                                                            class="btn btn-danger "><i class="fa fa-trash"></i></a>
                                                    @endif
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
            </form>
        </section>
    </div>
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(function(e) {
            $("#select_all_ids").click(function() {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@endsection
