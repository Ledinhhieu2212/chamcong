<form action="" method="post">
    <div class="row pt-3">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="ml-2">Tháng làm</label>
                        <select name="start_date" class="form-control py-2 px-3">
                            @foreach ($calendars as $calendar)
                                <option value="{{ $calendar->id }}">
                                    {{ \Carbon\Carbon::parse($calendar->start_date)->format('d/m/Y') }} -
                                    {{ \Carbon\Carbon::parse($calendar->end_date)->format('d/m/Y') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
    <button type="submit" class="my-2 btn btn-success">Tìm kiếm</button>
</form>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body table-responsive p-0">
                @if ($calendar_end->is_calendar_enabled == 1 || $calendar == null)
                    <div class=" calendar-table row">
                        <div class=" calendar-column col">
                            <ul class=" list-unstyled text-center">
                                <li class=" calendar-item"> Các ca </li>
                                <li class=" calendar-item">Ca sáng</li>
                                <li class=" calendar-item">Ca chiều</li>
                                <li class=" calendar-item">Ca đêm</li>
                            </ul>
                        </div>
                        @foreach ($day_works as $item)
                            <div class=" calendar-column col">
                                <ul class=" list-unstyled text-center">
                                    <li class=" calendar-item">{{ $item->date_day }}</li>

                                    @for ($i = 1; $i <= 3; $i++)
                                        <li class=" calendar-item "><input type="checkbox" class="form-control p-3"
                                                name="shifts[{{ $item['id'] }}][{{ $i }}]" value="1"
                                                id="" disabled>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h1>Hiện tại chưa có lịch đăng ký</h1>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
