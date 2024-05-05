@extends('layout')

@section('css')
    @include('components.user.head')
    <title>{{ $title }}</title>
@endsection

@section('script')
    @include('components.user.script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

        });

        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('.checkboxe1s');

            checkboxes.forEach(function(checkbox, index) {
                checkbox.addEventListener('change', function() {
                    // Lấy giá trị của checkbox được chọn
                    var checkboxValue = this.checked ? 1 : 0;

                    // Đặt giá trị của input hidden tương ứng thành giá trị của checkbox
                    document.getElementById('hidden-input-1-' + index).value = checkboxValue;
                });
            });
            var checkboxes = document.querySelectorAll('.checkboxe2s');

            checkboxes.forEach(function(checkbox, index) {
                checkbox.addEventListener('change', function() {
                    // Lấy giá trị của checkbox được chọn
                    var checkboxValue = this.checked ? 1 : 0;

                    // Đặt giá trị của input hidden tương ứng thành giá trị của checkbox
                    document.getElementById('hidden-input-2-' + index).value = checkboxValue;
                });
            });
            var checkboxes = document.querySelectorAll('.checkboxe3s');

            checkboxes.forEach(function(checkbox, index) {
                checkbox.addEventListener('change', function() {
                    // Lấy giá trị của checkbox được chọn
                    var checkboxValue = this.checked ? 1 : 0;

                    // Đặt giá trị của input hidden tương ứng thành giá trị của checkbox
                    document.getElementById('hidden-input-3-' + index).value = checkboxValue;
                });
            });
        });
    </script>
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
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('user.calendar.store') }}" method="post">
                    @csrf
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start">Từ ngày:</label>
                                        <input type="date" name="start" class="form-control" readonly
                                            value="{{ \Carbon\Carbon::now()->startOfWeek()->format('Y-m-d') }}">
                                        @if ($errors->has('start'))
                                            <span class="error-message">* {{ $errors->first('start') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end">Đến ngày:</label>
                                        <input type="date" name="end" class="form-control" readonly
                                            value="{{ \Carbon\Carbon::now()->startOfWeek()->addDays(6)->format('Y-m-d') }}">
                                        @if ($errors->has('end'))
                                            <span class="error-message">* {{ $errors->first('end') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="qrcode_id">Địa điểm:</label>
                                <select name="qrcode_id" id="" class="form-control">
                                    @foreach ($qrcodes as $qrcode)
                                        <option value="{{ $qrcode->id }}">{{ $qrcode->address }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('qrcode_id'))
                                    <span class="error-message">* {{ $errors->first('qrcode_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                                @for ($i = 0; $i < 7; $i++)
                                                    <td>
                                                        {{ Form::hidden("day1s[$i]", 0, ['id' => 'hidden-input-1-' . $i]) }}
                                                        {{ Form::checkbox("checkboxe1s[$i]", 1, false, ['id' => 'checkbox-1-' . $i, 'class' => 'checkboxe1s']) }}
                                                    </td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <td>Chiều</td>
                                                @for ($i = 0; $i < 7; $i++)
                                                    <td>
                                                        {{ Form::hidden("day2s[$i]", 0, ['id' => 'hidden-input-2-' . $i]) }}
                                                        {{ Form::checkbox("checkboxe2s[$i]", 1, false, ['id' => 'checkbox-2-' . $i, 'class' => 'checkboxe2s']) }}
                                                    </td>
                                                @endfor
                                            </tr>
                                            <tr>
                                                <td>Tối</td>
                                                @for ($i = 0; $i < 7; $i++)
                                                    <td>
                                                        {{ Form::hidden("day3s[$i]", 0, ['id' => 'hidden-input-3-' . $i]) }}
                                                        {{ Form::checkbox("checkboxe3s[$i]", 1, false, ['id' => 'checkbox-3-' . $i, 'class' => 'checkboxe3s']) }}
                                                    </td>
                                                @endfor
                                            </tr>
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

                    </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                </div>
            </div>
            </form>
    </div>
    </section>
    </div>



    <!-- /.control-sidebar -->
    </div>
@endsection
