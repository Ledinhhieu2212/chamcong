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
                        <form action="{{ route('user.calendar.search') }}" method="post">
                            @csrf
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md">
                                    <div class="form-group">
                                        <select name="datetime" class="form-control">
                                            @foreach ($calendars as $calendar)
                                                <option value="{{ $calendar->id }}"
                                                    {{ (old('datetime') ??  $select_calendar_id ) == $calendar->id ? 'selected' : '' }}>
                                                    {{ \Carbon\Carbon::parse($calendar->start_date)->format('d/m/Y') }} -
                                                    {{ \Carbon\Carbon::parse($calendar->end_date)->format('d/m/Y') }}
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
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class=" table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Thứ 2</th>
                                            <th>Thứ 3</th>
                                            <th>Thứ 4</th>
                                            <th>THứ 5</th>
                                            <th>Thứ 6</th>
                                            <th>Thứ 7</th>
                                            <th>Chủ nhật</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sáng</td>
                                            @foreach ($schedules as $schedule)
                                                <td>
                                                    <input type="checkbox" disabled
                                                        @if ($schedule->shift_1 == 1) checked @endif>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Chiều</td>
                                            @foreach ($schedules as $schedule)
                                                <td>
                                                    <input type="checkbox" disabled
                                                        @if ($schedule->shift_2 == 1) checked @endif>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Tối</td>
                                            @foreach ($schedules as $schedule)
                                                <td>
                                                    <input type="checkbox" disabled
                                                        @if ($schedule->shift_3 == 1) checked @endif>
                                                </td>
                                            @endforeach
                                        </tr>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- /.control-sidebar -->
    </div>
@endsection
