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
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                {{-- <div class="row justify-between align-items-end">
                    <div class="col-md-3">
                        <a href="{{ route('admin.calendar.create') }}" class="btn m-2 btn-secondary">Tính lương tháng mới <i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <h5 class="font-weight-bold py-2">Tổng lương các tháng:</h5> --}}
                                <table id="tblExample" class="table text-center table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Avatar</th>
                                            <th>Họ và tên</th>
                                            <th>Lương cứng</th>
                                            <th>Thưởng</th>
                                            <th>Phạt</th>
                                            <th>Tổng</th>
                                            {{-- <th>Hành động</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                                </td>
                                                <td><img src="{{ asset("assets/img/avatar/$user->image") }}" width="50"
                                                        height="50" alt="" class="img-user-crud rounded-circle">
                                                </td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>{{ $user->position->price }}đ</td>
                                                <td>
                                                    @php
                                                        $reward = 0;
                                                    @endphp
                                                    @foreach ($user->salaries()->get() as $salary)
                                                        @php
                                                            $reward +=
                                                                $salary->total +
                                                                $salary->total * ($salary->reward / 100); // Tính tổng
                                                        @endphp
                                                    @endforeach
                                                    {{ $reward }}
                                                </td>
                                                <td> {{ -ceil($user->salaries()->sum('reward')) }}đ
                                                </td>
                                                <td>
                                                    {{ $user->salaries()->sum('total_all') }}đ
                                                </td>
                                                {{-- <td>
                                                    <a href="{{ route('admin.salary.show', $user->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </td> --}}
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
