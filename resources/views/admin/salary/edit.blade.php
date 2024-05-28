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
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.qrcode.index') }}">QL mã chấm công</a></li>
                            <li class="breadcrumb-item">Cập nhật</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-center">
                    <div class="col-md-2">
                        <div class="form-group text-center">
                            <label for="name">Ảnh</label>
                            <img src="{{ asset("assets/img/avatar/$user->image") }}" width="200" height="250"
                                alt="" class="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Họ và tên:</label>
                            <input type="text" name="fullname" readonly value="{{ $user->fullname }}"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Tài khoản:</label>
                            <input type="text" name="username" readonly value="{{ $user->username }}"
                                class="form-control">
                        </div>
                        <div class="row justify-content-md-start">

                            <div class="col-6  form-group">
                                <label for="">Thời gian bắt đầu làm:</label>
                                <input type="text" name="date_last" readonly
                                    value="{{ date('d-m-Y', strtotime($user->timekeeps()->orderBy('date')->first()->date)) }}"
                                    class="form-control">
                            </div>
                            <div class=" col-6 form-group ">
                                <label for="">Đến:</label>
                                <input type="text" name="date_now" readonly
                                    value="{{ date('d-m-Y', strtotime($user->timekeeps()->orderByDesc('date')->first()->date)) }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.salary.edit.search', $user->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Chọn tháng:</label>
                                <select name="month" class="form-control">
                                    @foreach ($user->salaries as $salary)
                                        <option value="{{ $salary->id }}" @if ($salaryyy->id == $salary->id)
                                            @selected(true)
                                        @endif >Tháng
                                            {{ sprintf('%02d', $salary->month) }}/{{ $salary->year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary">Tìm kiếm </button>
                        </form>
                        <form action="{{ route('admin.salary.update', $user->id) }}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="col form-group">
                                <label for="">Lương:</label>
                                <input type="text" name="" readonly id="" value="{{$user->position->price}}đ" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="">Thưởng(%):</label>
                                    <input type="text" name="" id="" value="{{$salaryyy->reward}}" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <label for="">Tổng thưởng:</label>
                                    <input type="text" readonly name="" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-success">Lưu cập nhật</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <a href="{{ route('admin.salary.index') }}" class="btn my-2 btn-dark">Quay lại</a>
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
                                            <th>Tháng</th>
                                            <th>Lương </th>
                                            <th>Thưởng</th>
                                            <th>Phạt</th>
                                            <th>Tổng tháng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->salaries()->get() as $salary)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ sprintf('%02d', $salary->month) }}/{{ $salary->year }}</td>
                                                <td>{{ $salary->position->price }}đ</td>
                                                <td>{{ $salary->reward }}%</td>
                                                <td>{{ $salary->punish }}đ</td>
                                                <td>{{ $salary->total }}đ</td>
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
@endsection
