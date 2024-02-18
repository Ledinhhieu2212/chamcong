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
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3> Sửa thông tin nhân viên của bạn <small>Nhập thông tin vào các ô đúng yêu cầu.</small></h3>

                </div>
                <div class="ibox-content">
                    <form action="{{ route('admin.user.update', $user->id) }}" class="form-horizontal" method="POST"
                        enctype="multipart/form-data">
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
                        <div class="form-group"><label class="col-sm-2 control-label">Họ và tên</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="fullname"
                                    value="{{ $user->fullname }}"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Tên tài khoản</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="username"
                                    value="{{ $user->username }}">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Mật khẩu</label>
                            <div class="col-sm-10"><input type="password" value="{{ $user->password }}" class="form-control"
                                    name="password"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                            <div class="col-sm-10"><input type="password" value="{{ $user->password }}" class="form-control"
                                    name="re_password"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="ibox-title">
                            <h3>Thêm thông tin chi tiết</h3>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value="{{ $user->phone }}"
                                    name="phone">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Căn cước công dân</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value="{{ $user->cccd }}"
                                    name="cccd">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Địa chỉ</label>

                            <div class="col-sm-10"><input type="text" class="form-control" value="{{ $user->address }}"
                                    name="address"></div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Ngày sinh</label>

                            <div class="col-sm-10"><input type="date" value="{{ $user->birthday }}" class="form-control"
                                    name="birthday"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Giới tính</label>

                            <div class="col-sm-10">
                                <div><label> <input type="radio" @if($user->sex == 0) checked @endif
                                            value="0" name="sex"> Nữ</label></div>
                                <div><label> <input type="radio"  @if($user->sex == 1) checked @endif
                                            value="1" name="sex">
                                        Nam
                                    </label></div>
                                <div><label> <input type="radio"  @if($user->sex == 2) checked @endif
                                            value="2" name="sex"> Khác</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Ảnh đại diện</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" value="{{ $user->image }}">
                                <img @if (file_exists(public_path("assets/img/$user->image"))) src="{{ asset("assets/img/$user->image") }}"
                                                    @else
                                                        src="{{ $user->image }}" @endif
                                    class="image-avatar" width="100" height="100" alt="Ảnh avatar tài khoản" />
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="{{ route('admin.user') }}">Thoát</a>
                                <button class="btn btn-primary" type="submit">Lưu lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
