<div class="row pt-2">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body table-responsive p-0 overflow-hidden">
                <form action="{{ route('register.calendar.store') }}" method="post">
                    @csrf

                    @if ($calendar->is_calendar_enabled == 1 || $calendar == null)
                        <div class="row p-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="ml-2">Chọn ca làm việc cho tháng:</label>
                                    <input type="text" class="form-control text-center"
                                        value=" {{ \Carbon\Carbon::parse($calendar->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($calendar->end_date)->format('d/m/Y') }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
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
                                            <li class=" calendar-item"><input type="checkbox" class="form-control"
                                                    name="shifts[{{ $item['id'] }}][{{ $i }}]"
                                                    value="1" id="">
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Lưu lại</button>
                            </div>
                        </div>
                    @else
                        <h1>Hiện tại chưa có lịch đăng ký</h1>
                    @endif

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
