@extends('admin.qrcode.index')


@section('crud')
    <form method="POST" action="{{ route('admin.qrcode.update', $qrcode_edit->id) }}">
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
                            <label for="">Tên nhóm</label>
                            <input type="text" value="{{ $qrcode_edit->name }}" name="name" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Chế độ</label>
                            <select class="form-control" name="mode">
                                <option @if ($qrcode_edit->mode == 0) selected @endif value="0" selected>Mật khẩu
                                </option>
                                <option @if ($qrcode_edit->mode == 1) selected @endif value="1">Mật khẩu, chụp ảnh
                                </option>
                                <option @if ($qrcode_edit->mode == 2) selected @endif value="2">Mật khẩu, vân tay
                                </option>
                                <option @if ($qrcode_edit->mode == 3) selected @endif value="3">Mật khẩu, vân tay,
                                    chụp ảnh</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="">Địa chỉ </label>
                            <div class=" block">
                                <a href="" class="btn btn-primary"> Lấy địa chỉ nơi tạo mã qr</a>
                            </div>
                            <input type="text" name="address_address" value="{{ $qrcode_edit->address_address }}"
                                class="form-control mt-3" />
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
                                    <td><input type="checkbox" @if ($user->detail_qrcodes->where('qrcode_id', $qrcode_edit->id)->isNotEmpty()) checked @endif
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
