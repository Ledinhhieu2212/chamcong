@include('admin.home.dashboard-user.add.heading')
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
                    <label for="username" class="formbold-form-label"> Tên tài khoản <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="username" id="username" class="formbold-form-input"
                        value="{{ $user->username }}" />
                </div>
            </div>

            <div class="formbold-input-flex">
                <div>
                    <label for="email" class="formbold-form-label"> Email <span class="text-danger">*</span></label>
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
                            <input type="radio" name="sex" value="1" {{ $user->sex == 1 ? 'checked' : '' }}
                                class="radio-form-input" />
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
