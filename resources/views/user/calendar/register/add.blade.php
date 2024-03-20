<div class="row pt-2">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body table-responsive p-0 overflow-hidden">
                <form action="{{ route('register.calendar.store') }}" method="post">
                    @csrf

                    @if ($status)
                        <div class="row p-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="ml-2">Chọn ca làm việc cho tháng:</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" name="" class="form-control text-center"
                                                value="{{ \Carbon\Carbon::parse($calendar->end_date)->format('d/m/Y') }}"
                                                readonly>
                                        </div>
                                        <div class="">Đến</div>
                                        <div class="col-md-6">
                                            <input type="text" name="" class="form-control text-center"
                                                value=" {{ \Carbon\Carbon::parse($calendar->start_date)->format('d/m/Y') }}"
                                                readonly>
                                        </div>
                                    </div>
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
                            @for ($i = 1; $i <= 6; $i++)
                                @php
                                    $found = false;
                                    $shift1[$i] = 0;
                                    $shift2[$i] = 0;
                                    $shift3[$i] = 0;
                                @endphp
                                <div class=" calendar-column col">
                                    <ul class=" list-unstyled text-center">
                                        <li class=" calendar-item">{{ $day[$i] }}</li>
                                        <li class="calendar-item">
                                            <input type="checkbox" class="form-control"
                                                name="shift_1[{{ $i }}]" value="1">
                                            <input type="hidden" name="shift1[{{ $i }}]" value="0">
                                        </li>
                                        <li class="calendar-item">
                                            <input type="checkbox" class="form-control"
                                                name="shift_2[{{ $i }}]" value="1">
                                            <input type="hidden" name="shift2[{{ $i }}]" value="0">
                                        </li>

                                        {{-- Checkbox cho Shift 3 --}}
                                        <li class="calendar-item">
                                            <input type="checkbox" class="form-control"
                                                name="shift_3[{{ $i }}]" value="1">
                                            <input type="hidden" name="shift3[{{ $i }}]" value="0">
                                        </li>
                                    </ul>
                                </div>
                            @endfor
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Lưu lại</button>
                            </div>
                        </div>
                    @elseif($calendar->is_calendar_enabled == 1 && $calendar->is_registered == 1)
                        <h1>Đã đăng ký lịch làm thành công!</h1>
                    @else
                        <h1>Hiện tại chưa có lịch đăng ký!</h1>
                    @endif

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
