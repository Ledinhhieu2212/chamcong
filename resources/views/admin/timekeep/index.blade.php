@extends('layout')

@section('css')
    @include('components.admin.head')
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.admin.script')
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>
    <script>
        $(function() {
            $("#exporttable").click(function(e) {
                var table = $("#htmltable");
                if (table && table.length) {
                    $(table).table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "" + new Date().toISOString().replace(/[\-\:\.]/g,
                            "") + ".xls",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true,
                        preserveColors: false
                    });
                }
            });

        });
    </script>
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
                <div class="row py-2 align-items-end">
                    <div class="col-md-1 pb-2">
                        <button id="exporttable" class="btn btn-primary">Export</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="htmltable" class="table  text-center table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ảnh</th>
                                            <th>Họ và tên</th>
                                            <th><span class="btn bg-success font-weight-bold">Đúng giờ</span></th>
                                            <th><span class="btn bg-warning font-weight-bold">Muộn giở</span></th>
                                            <th><span class="btn bg-purple font-weight-bold">Về sớm</span></th>
                                            <th><span class="btn bg-secondary font-weight-bold">Nghỉ</span></th>
                                            <th><span class="btn bg-primary font-weight-bold">Nghỉ có phép</span></th>
                                            <th><span class="btn bg-danger font-weight-bold">Nghỉ không phép</span></th>
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
                                                <td><span
                                                        class="btn btn-success font-weight-bold">{{ $user->detail_timekeeps->where('status', 1)->count() }}
                                                    </span>
                                                </td>
                                                <td> <span class="btn btn-warning font-weight-bold">
                                                        {{ $user->detail_timekeeps->where('status', 2)->count() }}</span>
                                                </td>
                                                <td> <span class="btn  bg-purple font-weight-bold">
                                                        {{ $user->detail_timekeeps->where('status', 3)->count() }}</span>
                                                </td>
                                                <td> <span class="btn  bg-secondary font-weight-bold">
                                                        {{ $user->detail_timekeeps->where('status', 4)->count() }}</span>
                                                </td>
                                                <td> <span class="btn   bg-primary font-weight-bold">
                                                        {{ $user->detail_timekeeps->where('status', 5)->count() }}</span>
                                                </td>
                                                <td> <span class="btn bg-danger font-weight-bold">
                                                        {{ $user->detail_timekeeps->where('status', 6)->count() }}</span>
                                                </td>
                                                {{-- <td>
                                                    <a href="{{route("admin.timekeep.show", $user->id)}}" class="btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- /.card -->
                            </div>
                            <!-- /.card-body -->
                            <div class="pagination pl-4">
                                {{ $users->onEachSide(5)->links() }}
                            </div>
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>
@endsection
