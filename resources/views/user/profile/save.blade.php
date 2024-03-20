<form action="{{ route('profile.update') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" name="fullname" class="form-control" value="{{ $user_account->fullname }}" />
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="">Tài khoản</label>
                <input type="text" name="username" class="form-control" value="{{ $user_account->username }}" readonly  />
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="">Công việc</label>
                <input type="text" name="username" class="form-control" value="{{ $position->job }}" readonly  />
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $user_account->email }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" class="form-control"value="{{ $user_account->password }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" name="re_password" class="form-control" value="{{ $user_account->password }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">CCCD/CMND</label>
                <input type="text" name="cccd" class="form-control"value="{{ $user_account->cccd }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="{{ $user_account->phone }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Giới tính</label>
                <select class="form-control" name="sex">
                    <option @if ($user_account->sex == 0) selected @endif value="0" selected>Nữ</option>
                    <option @if ($user_account->sex == 1) selected @endif value="1">Nam</option>
                    <option @if ($user_account->sex == 2) selected @endif value="2">Khác</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Ngày sinh</label>
                <input type="date" name="birthday" class="form-control" value="{{ $user_account->birthday }}" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="{{ $user_account->address }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Ảnh đại diện</label>
                        <input type="file" name="image" class="form-control" value="{{ $user_account->image }}" />
                    </div>
                    <div class="col-md-6">
                        <img @if (file_exists(public_path("assets/img/$user_account->image"))) src="{{ asset("assets/img/$user_account->image") }}"
                        @else
                            src="{{ $user_account->image }}" @endif
                            class="image-avatar" width="230" height="230"  alt="Ảnh avatar tài khoản" />
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group text-center">
                <div class="" id="printableArea">
                    <img src="data:image/png;base64,{{ $base64QrCode }}" alt="" class="image-profile-qrcode">
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{ route('home') }}" class="btn btn-danger">Thoát</a>
                <button type="submit" class="btn btn-success">Lưu lại</button>
                <button onclick="printElement('printableArea')" class="btn btn-info">In mã Qr</button>
            </div>
        </div>
    </div>
</form>
