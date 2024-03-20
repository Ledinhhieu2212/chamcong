@extends('layout')


@section('css')
    {{ $title = $data['title'] }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
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
                                        {{-- <div class="external-event bg-info">Đổi ca</div> --}}
                                        <div class="external-event bg-secondary">Nghỉ</div>
                                        <div class="external-event bg-primary">Nghỉ phép</div>
                                        <div class="external-event bg-danger">Nghỉ không phép</div>
                                        {{-- <div class="checkbox">
                                            <label for="drop-remove">
                                                <input type="checkbox" id="drop-remove">
                                                Xóa thông báo sau khi chọn
                                            </label>
                                        </div> --}}
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.timekeep.post') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="month">Ngày:</label>
                                <input type="number" name="day" min="1" max="31" class="form-control"
                                    placeholder="Nhập số ngày" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="month">Tháng:</label>
                                <input type="number" name="month" min="1" max="12" class="form-control"
                                    placeholder="Nhập số tháng" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="year">Năm:</label>
                                <input type="number" name="year" min="1900" max="2100"
                                    class="inline form-control " placeholder="Nhập số năm" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông báo chấm công của nhân viên</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Ngày chấm công</th>
                                            <th>Tài khoản chấm công</th>
                                            <th>Chấm công làm</th>
                                            <th>Chấm công về</th>
                                            <th>Trạng thái chấm công</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($data['timekeeps'] as $timekeep)
                                            @php
                                                $avatar = $timekeep->user->image;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <p> {{ \Carbon\Carbon::parse($timekeep->date)->format('d/m/Y') }}
                                                    </p>
                                                </td>
                                                <td>

                                                    <img @if (file_exists(public_path("assets/img/$avatar"))) src="{{ asset("assets/img/$avatar") }}"
                                                @else
                                                    src="{{ $avatar }}" @endif
                                                        class="image-avatar" width="50" height="50"
                                                        alt="Ảnh avatar tài khoản" />
                                                </td>
                                                <td>
                                                    @if ($timekeep)
                                                        <p>{{ $timekeep->time_in }}</p>
                                                    @else
                                                        <p>--:--:--</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($timekeep)
                                                        <p>{{ $timekeep->time_out }}</p>
                                                    @else
                                                        <p>--:--:--</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($timekeep)
                                                        @if ($timekeep->status == 1)
                                                            <span class="text-warning p-2 px-3 bg-success rounded">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                        @elseif ($timekeep->status == 2)
                                                            @if ($timekeep->absent_status)
                                                                <span class="py-2 px-3 ml-2 bg-primary rounded">
                                                                    <i class="fa-solid fa-check-double"></i>
                                                                </span>
                                                            @else
                                                                <span class="py-2 px-3 ml-2 bg-danger rounded">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </span>
                                                            @endif
                                                        @else
                                                            @if ($timekeep->late_status)
                                                                <span class=" py-2 px-3 ml-2 bg-warning rounded">
                                                                    <i class="fa-solid text-white  fa-exclamation"></i>
                                                                </span>
                                                            @endif
                                                            @if ($timekeep->early_status)
                                                                <span class="p-2 ml-2 bg-purple rounded">
                                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                                </span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        <span class="bg-secondary rounded p-2">
                                                            <i class="fas fa-square  text-secondary"></i>
                                                        </span>
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
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
