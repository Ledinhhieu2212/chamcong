@extends('layout')

@section('css')
@endsection

@section('nav')
    @include('admin.components.nav')
@endsection

@section('navbar')
    @include('admin.components.navbar')
@endsection


@section('content')
    <div class="wrapper wrapper-content">
        <div class="wrapper wrapper-content">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Bảng thông tin nhân viên </h5>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-10">
                                {{ $users->links('pagination::bootstrap-4') }}
                            </div>
                            <div class="col-lg-2 align-items-end">
                                <a href="{{ route('admin.user.create') }}" class="btn btn-danger block"><i
                                        class="fa fa-plus"></i> Thêm mới</a>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <input type="checkbox" value="" id="checkAll" class="input-checkbox" />
                                    </th>
                                    <th class="text-center">Avatar</th>
                                    <th class="text-center">Thông tin</th>
                                    <th class="text-center">QR code</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" value="" class="input-checkbox checkBoxItem" />
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ $user->image }}" class="image-avatar" width="100"
                                                height="100" alt="Ảnh avatar tài khoản" />
                                        </td>
                                        <td>
                                            <div class="info-item name-item"><strong>Họ và tên:</strong>
                                                {{ $user->fullname }}</div>
                                            <div class="info-item email-item"><strong>Email: </strong> {{ $user->email }}
                                            </div>
                                            <div class="info-item address-item"><strong>Địa chỉ:</strong>
                                                {{ $user->address }}</div>
                                            <div class="info-item phone-item"><strong>Số điện thoại:</strong>
                                                {{ $user->phone }}</div>
                                            <div class="info-item cccd-item"><strong>Căn cước công dân:</strong>
                                                {{ $user->cccd }}</div>
                                            <div class="info-item name-item"><strong>Ngày sinh:</strong>
                                                {{ $user->birthday }}</div>
                                            <div class="info-item name-item"><strong>Giới tính:</strong>
                                                @if ($user->sex == 0)
                                                    Nữ
                                                @elseif ($user->sex == 1)
                                                    Nam
                                                @elseif ($user->sex == 2)
                                                    Khác
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {!! QrCode::size(100)->generate('{{ $user->qrcode }}') !!}
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" class="js-switch" disabled
                                                @if ($user->status) checked @endif />
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
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
