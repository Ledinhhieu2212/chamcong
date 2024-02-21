<div class="row">
    <div class="col-12">
        <div class="card">
            {{-- {{ $users->links("pagination::bootstrap-4") }} --}}
            <div class="card-body  table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th>Nhóm dùng qrcode</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái sử dụng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($qrcodes as $qrcode)
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>

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
