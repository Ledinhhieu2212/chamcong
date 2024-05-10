@extends('layout')

@section('css')
    @include('components.admin.head')
    <link rel="stylesheet" href="{{ asset('assets/admin/user/style.css') }}">
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.admin.script')
    <script src="{{ asset('assets/admin/user/script.js') }}"></script>
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
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
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
                                        <input type="text" name="fullname" class="form-control"
                                            placeholder="Tìm kiếm tên nhân viên">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Tìm kiếm tên tài khoản">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <select name="job" id="" class="form-control">
                                            <option value="">--- Lựa chọn --- </option>
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}" class="form-control">
                                                    {{ $position->job }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-secondary">Thêm mới <i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Avatar</th>
                                            <th>Họ và tên</th>
                                            <th>Tên tài khoản</th>
                                            <th>Công việc</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                                </td>
                                                <td><img src="{{ asset("assets/img/avatar/$user->image") }}" width="50"
                                                        height="50" alt="" class="img-user-crud"></td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->position->NamePosition($user->position_id) }}</td>
                                                <td>
                                                    @if ($loginUser == $user->id)
                                                        Hoạt động
                                                    @else
                                                        Đăng xuất
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.user.show', $user->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a onclick="openModal('{{ $user->remember_token }}')"
                                                        class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    @include('admin.user.destroy')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <div class="pagination">
                            {{ $users->onEachSide(5)->links() }}
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>
@endsection
