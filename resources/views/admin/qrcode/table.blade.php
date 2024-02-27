<div class="row">
    <div class="col-12">
        <div class="card">

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
                            @php
                                $mode = " ";
                                if ($qrcode->mode  == 0) {
                                    $mode = "Mật khẩu";
                                }
                                if( $qrcode->mode  == 1){
                                    $mode = "Mật khẩu, chụp ảnh";
                                }

                                if ($qrcode->mode  == 2) {
                                    $mode = "Mật khẩu, vân tay";
                                }

                                if ($qrcode->mode  == 3) {
                                    $mode = "Mật khẩu, vân tay, chụp ảnh";
                                }
                            @endphp
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>{{ $qrcode->name }}</td>
                                <td> {{ $qrcode->address_address }}</td>
                                <td>{{ $mode }} </td>
                                <td class="text-center">
                                    <a  href="{{ route('admin.qrcode.generate', $qrcode->id) }}"  class="btn btn-primary" > <i class="fa fa-qrcode"></i></a>
                                    <a href="{{ route('admin.qrcode.edit', $qrcode->id) }}" class="btn btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.qrcode.delete', $qrcode->id) }}" class="btn btn-danger"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                                <img id="qrcodeImg_{{ $qrcode->id }}" style="display: none;">
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
