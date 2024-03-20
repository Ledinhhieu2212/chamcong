@extends('user.calendar.show.index')

@section('search')
    <section class="content">
        <div class="container-fluid ">
            <form action="{{ route('calendar.search') }}" method="post">
                @csrf
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="ml-2">Tháng làm</label>
                                    <select name="select_option" class="form-control py-2 px-3">
                                        @foreach ($calendars as $calendar)
                                            <option value="{{ $calendar->detail_calendar_id }}"
                                                {{ $calendar->id == $calendarId ? 'selected' : '' }}>
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

                {{-- Table --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                @if ($status)
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
                                                $shift1 = 0;
                                                $shift2 = 0;
                                                $shift3 = 0;
                                                // Lặp qua danh sách lịch làm việc
                                                foreach ($schedules as $schedule) {
                                                    if ($schedule->day == $i) {
                                                        $found = true;
                                                        $shift1 = $schedule->shift_1;
                                                        $shift2 = $schedule->shift_2;
                                                        $shift3 = $schedule->shift_3;
                                                        // Có thể thêm xử lý cho các ca làm việc khác nếu cần
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            <div class=" calendar-column col">
                                                <ul class=" list-unstyled text-center">
                                                    <li class=" calendar-item">{{ $day[$i] }}</li>
                                                    @if ($found)
                                                        <li class=" calendar-item "><input type="checkbox"
                                                                class="checkbox-calendar form-control p-3" value="1"
                                                                {{ $shift1 == 1 ? 'checked' : '' }} id=""
                                                                disabled />
                                                        </li>
                                                        <li class=" calendar-item "><input type="checkbox"
                                                                class="checkbox-calendar form-control p-3" value="1"
                                                                {{ $shift2 == 1 ? 'checked' : '' }} id=""
                                                                disabled />
                                                        </li>
                                                        <li class=" calendar-item "><input type="checkbox"
                                                                class="checkbox-calendar form-control p-3" value="1"
                                                                {{ $shift3 == 1 ? 'checked' : '' }} id=""
                                                                disabled />
                                                        </li>
                                                    @else
                                                        <li class=" calendar-item "><input type="checkbox"
                                                                class="checkbox-calendar form-control p-3" value="1"
                                                                id="" disabled />
                                                        </li>
                                                        <li class=" calendar-item "><input type="checkbox"
                                                                class="checkbox-calendar form-control p-3" value="1"
                                                                id="" disabled />
                                                        </li>
                                                        <li class=" calendar-item "><input type="checkbox"
                                                                class="checkbox-calendar form-control p-3" value="1"
                                                                id="" disabled />
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endfor
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
                {{-- End Table --}}

            </form>

        </div>
    </section>

@endsection
