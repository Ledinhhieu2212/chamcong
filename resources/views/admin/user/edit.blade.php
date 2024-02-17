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
                    <h3> Thêm thông tin nhân viên của bạn <small>Nhập thông tin vào các ô đúng yêu cầu.</small></h3>

                </div>
                <div class="ibox-content">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
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

                            <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                            <div class="col-sm-10"><input type="password" class="form-control" name="re_password"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="ibox-title">
                            <h3>Thêm thông tin chi tiết</h3>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="phone"
                                    value="{{ $user->phone }}">
                            </div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Căn cước công dân</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="cccd"
                                    value="{{ $user->cccd }}">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Địa chỉ</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="address"
                                    value="{{ $user->address }}"></div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Ngày sinh</label>

                            <div class="col-sm-10"><input type="date" class="form-control" name="birthday"
                                    value="{{ $user->birthday }}"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Giới tính</label>

                            <div class="col-sm-10">
                                <div><label> <input type="radio" {{ $user->sex == 0 ? 'checked' : '' }} value="0"
                                            name="optionsRadios"> Nam
                                    </label></div>
                                <div><label> <input type="radio" {{ $user->sex == 1 ? 'checked' : '' }} value="1"
                                            name="optionsRadios"> Nữ</label></div>
                                <div><label> <input type="radio" {{ $user->sex == 2 ? 'checked' : '' }} value="2"
                                            name="optionsRadios"> Khác</label></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Ảnh đại diện</label>
                            <div class="col-sm-10"><input type="file" class="form-control" name="image"></div>
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
    <div class="formbold-main-wrapper">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="formbold-form-title">

                    <h2 class="">Sửa thông tin nhân viên của bạn</h2>
                    <p>
                        Sửa thông tin vào các ô đúng yêu cầu.
                    </p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="formbold-input-flex">
                    <div>
                        <label for="fullname" class="formbold-form-label">
                            Họ và tên
                        </label>
                        <input type="text" name="fullname" id="fullname" class="formbold-form-input"
                            value="{{ $user->fullname }}" />
                    </div>
                    <div>
                        <label for="username" class="formbold-form-label"> Tên tài khoản <span
                                class="text-danger">*</span>
                        </label>
                        <input type="text" name="username" id="username" class="formbold-form-input"
                            value="{{ $user->username }}" />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label"> Email <span
                                class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="formbold-form-input"
                            value="{{ $user->email }}" />
                    </div>
                    <div>
                        <label for="password" class="formbold-form-label"> Mật khẩu <span
                                class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" value="{{ $user->password }}"
                            class="formbold-form-input" />
                    </div>
                </div>
                <div>
                    <label for="password" class="formbold-form-label"> Nhập lại mật khẩu <span
                            class="text-danger">*</span></label>
                    <input type="password" name="re_password" id="re_password" value="{{ $user->password }}"
                        class="formbold-form-input" />
                </div>

                <div>
                    <label for="cccd" class="formbold-form-label"> Số điện thoại <span
                            class="text-danger">*</span></label>
                    <input type="text" name="cccd" class="formbold-form-input" value="{{ $user->cccd }}" />
                </div>
                <div class="formbold-input-flex">

                    <div class="formbold-mb-3">
                        <label for="address" class="formbold-form-label">
                            Địa chỉ
                        </label>
                        <input type="text" name="address" id="address" class="formbold-form-input"
                            value="{{ $user->address }}" />
                    </div>
                    <div class="formbold-mb-3">
                        <label for="sex" class="formbold-form-label">
                            Giới tính
                        </label>
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <input type="radio" name="sex" class="radio-form-input" value="0"
                                    {{ $user->sex == 0 ? 'checked' : '' }} />
                                <label for="radio-male">Nữ</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="sex" value="1"
                                    {{ $user->sex == 1 ? 'checked' : '' }} class="radio-form-input" />
                                <label for="radio-female">Nam</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="sex" class="radio-form-input"
                                    {{ $user->sex == 2 ? 'checked' : '' }} value="2" />
                                <label for="radio-other">Khác</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formbold-input-flex">
                    <div class="formbold-mb-3">
                        <label for="phone" class="formbold-form-label">
                            Số điện thoại <span class="text-danger">*</span>
                        </label>
                        <input type="text" value="{{ $user->phone }}" name="phone" id="phone"
                            class="formbold-form-input" />
                    </div>
                    <div class="formbold-mb-3">
                        <label for="birthday" class="formbold-form-label">
                            Ngày sinh
                        </label>
                        <input type="date" name="birthday" value="{{ $user->birthday }}" id="birthday"
                            class="formbold-form-input" />
                    </div>
                </div>
                <div>
                    <label for="image" class="formbold-form-label"> Ảnh đại diện </label>
                    <img src="{{ $user->image }}" alt="" width="150" height="150" class="image-avatar">
                    <input type="text" name="image" value="{{ $user->image }}" class="formbold-form-input" />
                </div>
                <button class="formbold-btn" type="submit" name="send" value="send">Lưu lại</button>
            </form>
        </div>
    </div>
@endsection
