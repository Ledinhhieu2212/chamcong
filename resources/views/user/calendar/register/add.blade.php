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
                            @php
                                $shift1Values = $shift1 ?? [];
                                $shift2Values = $shift1 ?? [];
                                $shift3Values = $shift1 ?? [];
                            @endphp
                            @for ($i = 1; $i <= 6; $i++)
                                <div class=" calendar-column col">
                                    <ul class=" list-unstyled text-center">
                                        <li class=" calendar-item">{{ $day[$i] }}</li>
                                        

                                        <li class="calendar-item">
                                            <input type="checkbox" class="form-control"
                                                name="shift1[{{ $i }}]" value="1"
                                                {{ in_array($i, $shift1Values) ? 'checked' : '' }}>
                                            <input type="hidden" name="shift1[{{ $i }}]" value="0">
                                        </li>
                                        <li class="calendar-item">
                                            <input type="checkbox" class="form-control"
                                                name="shift2[{{ $i }}]" value="1"
                                                {{ in_array($i, $shift2Values) ? 'checked' : '' }}>
                                            <input type="hidden" name="shift2[{{ $i }}]" value="0">
                                        </li>

                                        {{-- Checkbox cho Shift 3 --}}
                                        <li class="calendar-item">
                                            <input type="checkbox" class="form-control"
                                                name="shift3[{{ $i }}]" value="1"
                                                {{ in_array($i, $shift3Values) ? 'checked' : '' }}>
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
