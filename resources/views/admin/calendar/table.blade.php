<form method="get" action="{{ route('admin.user.delete.all') }}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  table-responsive p-0" style="height: 500px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Ngày tạo</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calendars as $calendar)
                                <tr>
                                    <td>
                                        {{ \Carbon\Carbon::parse($calendar->date_now)->format('d-m-Y') }}

                                    </td>
                                    <td>
                                        @if ($calendar->start_date === null)
                                            Chưa nhập ngày
                                        @else
                                            {{ \Carbon\Carbon::parse($calendar->start_date)->format('d-m-Y') }}
                                        @endif
                                    </td>
                                    <td>@if ($calendar->end_date === null)
                                        Chưa nhập ngày
                                    @else
                                        {{ \Carbon\Carbon::parse($calendar->end_date)->format('d-m-Y') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.calendar.edit', ['id' => $calendar->id]) }}"
                                            class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.calendar.delete', ['id' => $calendar->id]) }}"
                                            class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
        <!-- /.col -->
    </div>
