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
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
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
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông báo chấm công của nhân viên</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table text-center table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ngày chấm công</th>
                                            <th>Chấm công làm</th>
                                            <th>Chấm công về</th>
                                            <th>Trạng thái chấm công</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($timekeeps as $timekeep)
                                            <tr>
                                                <td>{{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($timekeep->date)->format('d/m/Y') }}</td>
                                                <td>{{ $timekeep->time_in }}
                                                </td>
                                                <td>{{ $timekeep->time_out }}</td>
                                                <td>
                                                    @foreach ($timekeep->detail_timekeeps as $detail_timekeep)
                                                        @if ($detail_timekeep->status == 1)
                                                            <span class="btn btn-success"><i
                                                                    class="fa-solid fa-check"></i></span>
                                                        @elseif($detail_timekeep->status == 2)
                                                            <span class="btn btn-warning"><i
                                                                    class="fa-solid fa-exclamation"></i></span>
                                                        @elseif($detail_timekeep->status == 3)
                                                            <span class="btn bg-purple"><i
                                                                    class="fa-solid fa-circle-exclamation"></i> </span>
                                                        @elseif($detail_timekeep->status == 4)
                                                            <span class="btn btn-secondary"> Nghỉ</span>
                                                        @elseif($detail_timekeep->status == '5')
                                                            <span class="btn btn-primary"><i
                                                                    class="fa-solid fa-check-double"></i> </span>
                                                        @elseif($detail_timekeep->status == '6')
                                                            <span class="btn btn-danger"><i
                                                                    class="fa-solid fa-circle-xmark"></i> </span>
                                                        @endif
                                                    @endforeach
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
                </div>
            </div>
        </section>
    </div>
@endsection
