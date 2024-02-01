@include('admin.home.dashboard-user.add.heading')
<div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="formbold-form-title">

                <h2 class="">Thêm thông tin nhân viên của bạn</h2>
                <p>
                    Nhập thông tin vào các ô đúng yêu cầu.
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
                        value="{{ old('fullname') }}" />
                </div>
                <div>
                    <label for="username" class="formbold-form-label"> Tên tài khoản <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="username" id="username" class="formbold-form-input"
                        value="{{ old('username') }}" />
                </div>
            </div>

            <div class="formbold-input-flex">
                <div>
                    <label for="email" class="formbold-form-label"> Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="formbold-form-input"
                        value="{{ old('email') }}" />
                </div>
                <div>
                    <label for="password" class="formbold-form-label"> Mật khẩu <span
                            class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" class="formbold-form-input" />
                </div>
            </div>
            <div>
                <label for="password" class="formbold-form-label"> Nhập lại mật khẩu <span
                        class="text-danger">*</span></label>
                <input type="password" name="re_password" class="formbold-form-input" />
            </div>
            <div>
                <label for="cccd" class="formbold-form-label"> Số điện thoại <span
                        class="text-danger">*</span></label>
                <input type="text" name="cccd" class="formbold-form-input" />
            </div>
            <div class="formbold-input-flex">
                <div class="formbold-mb-3">
                    <label for="address" class="formbold-form-label">
                        Địa chỉ
                    </label>
                    <input type="text" name="address" id="address" class="formbold-form-input"
                        value="{{ old('address') }}" />

                </div>

                <div class="formbold-mb-3">
                    <label for="sex" class="formbold-form-label">
                        Giới tính
                    </label>
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <input type="radio" name="radio" checked="checked" value="0" class="radio-form-input" />
                            <label for="radio-male">Nữ</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="radio" value="1" class="radio-form-input" />
                            <label for="radio-female">Nam</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="radio" class="radio-form-input" value="2" />
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
                    <input type="text" value="{{ old('phone') }}" name="phone" id="phone"
                        class="formbold-form-input" />
                </div>
                <div class="formbold-mb-3">
                    <label for="birthday" class="formbold-form-label">
                        Ngày sinh
                    </label>
                    <input type="date" name="birthday" id="birthday" class="formbold-form-input" />
                </div>
            </div>
            <div>
                <label for="image" class="formbold-form-label"> Ảnh đại diện </label>
                <input type="text" name="image" id="password" class="formbold-form-input" />
            </div>
            <button class="formbold-btn" type="submit" name="send" value="send">Lưu lại</button>
        </form>
    </div>
</div>
