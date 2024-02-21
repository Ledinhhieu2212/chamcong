<form method="get" action="{{ route('admin.user.delete.all') }}">
    @csrf
    <div class="row py-2">
        <div class="col-md-6">
            <button class="btn btn-danger" type="submit">Xóa tất cả nhân viên đã chọn</button>
        </div>
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control ">
                    </div>
                </div>

                <div class="col-md-3">
                    <a href="" class="btn btn-secondary">Tìm kiếm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  table-responsive p-0" style="height: 500px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="select_all_ids"></th>
                                <th>Ảnh</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Công việc</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users_array as $user)
                                <tr>
                                    <td><input type="checkbox" name="ids[{{ $user->id }}]" class="checkbox_ids"
                                            value="{{ $user->id }}"></td>
                                    <td>
                                        <img @if (file_exists(public_path("assets/img/$user->image"))) src="{{ asset("assets/img/$user->image") }}"
                                    @else
                                        src="{{ $user->image }}" @endif
                                            class="image-avatar" width="50" height="50"
                                            alt="Ảnh avatar tài khoản" />
                                    </td>
                                    <td> {{ $user->fullname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->position)
                                            {{ $user->position->job }}
                                        @else
                                            N/A or any default value
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-success"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></a>
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
