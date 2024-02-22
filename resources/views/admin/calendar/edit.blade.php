@extends('admin.calendar.index')


@section('crud')
    <form method="POST" action="{{ route('admin.calendar.update', $calendar_edit->id) }}">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row p-3">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Ngày lập lịch làm</label>
                            <input type="date" name="date_now"
                                value="{{ \Carbon\Carbon::parse($calendar_edit->date_now)->format('Y-m-d') }}"
                                class="form-control" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tháng bắt đầu</label>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ \Carbon\Carbon::parse($calendar_edit->start_date)->format('Y-m-d') }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cuối tháng</label>
                            <input type="date" name="end_date" class="form-control"
                                value="{{ \Carbon\Carbon::parse($calendar_edit->end_date)->format('Y-m-d') }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cho phép đăng ký ca làm</label>
                            <input type="checkbox" name="is_calendar_enabled"
                                @if ($calendar_edit->is_calendar_enabled == 1) checked @endif value="1" class="form-control " />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 border rounded">
                <div class="card-body  table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="select_all_ids"></th>
                                <th>Tên</th>
                                <th>Tài khoản</th>
                                <th>Ảnh</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray">
                            @foreach ($users_array as $user)
                                <tr>
                                    <td><input type="checkbox" @if ($user->detail_calendars->where('calendar_id', $calendar_edit->id)->isNotEmpty()) checked @endif
                                            name="ids[{{ $user->id }}]" class="checkbox_ids"
                                            value="{{ $user->id }}"></td>

                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td><img @if (file_exists(public_path("assets/img/$user->image"))) src="{{ asset("assets/img/$user->image") }}"
                                    @else
                                        src="{{ $user->image }}" @endif
                                            class="image-avatar rounded-circle" width="30" height="30"
                                            alt="Ảnh avatar tài khoản" />
                                    <td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Lưu lại</button>
            </div>
        </div>
    </form>
@endsection
