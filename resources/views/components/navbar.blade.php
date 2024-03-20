<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="min-height: 100%;">
    <!-- Brand Logo -->
    <div class="text-center brand-text block">

        <img @if (file_exists(public_path("assets/img/$user_account->image"))) src="{{ asset("assets/img/$user_account->image") }}"
                        @else
                            src="{{ $user_account->image }}" @endif
            class=" rounded-circle avatar" width="100" height="100" alt="" />
    </div>
    <div class="brand-text font-weight-light text-center">{{ $user_account->username }}</div>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @if ($user_account->position_id == 999)
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item {{ Route::currentRouteName() == 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}" class="nav-link">
                            <div class="f-flex justify-content-center">
                                <i class="fa fa-home  "></i>
                                <p>
                                    Trang chủ
                                </p>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ route('admin.position.index') }}" class="nav-link">

                            <div class="f-flex justify-content-center">
                                <p> Chức vụ
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('admin.user.create') }}" class="nav-link">

                            <div class="f-flex justify-content-center">
                                <i class="fa fa-user  "></i>
                                <p> Nhân viên
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.qrcode.create') }}" class="nav-link">
                            <div class="f-flex justify-content-center">
                                <i class="fa fa-qrcode" aria-hidden="true"></i>
                                <p>
                                    Qr Code
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('admin.calendar') }}" class="nav-link">
                            <div class="f-flex justify-content-center">
                                <i class="fa fa-calendar"></i>
                                <p>
                                    Lịch làm
                                </p>
                            </div>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.timekeep') }}" class="nav-link">
                            <div class="f-flex justify-content-center">
                                <i class="fa-solid fa-calendar-xmark "></i>
                                <p>
                                    Chấm công
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <div class="f-flex justify-content-center">
                                <i class="fas fa-chart-pie"></i>
                                <p>
                                    Thống kê
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <div class="f-flex justify-content-center">
                                <i class="fa fa-sign-out"></i>
                                <p>
                                    Đăng xuất
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            @else
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="fa fa-home "></i>
                            <p>
                                Trang chủ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}">
                        <a href="{{ route('profile') }}" class="nav-link">
                            <div class="f-flex justify-content-center">

                                <i class="fa fa-user  "></i>
                                <p> Thông tin
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="" class="nav-link">
                            <i class="fa fa-calendar"></i>
                            <p>
                                QL làm việc <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item {{ Route::currentRouteName() == 'calendar' ? 'active' : '' }}">
                                <a href="{{ route('calendar') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lịch làm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register.calendar') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Đăng ký lịch làm</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('timekeep') }}" class="nav-link">
                            <div class="f-flex justify-content-center">
                                <i class="fa-solid fa-calendar-xmark "></i>
                                <p>
                                    Chấm công
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <div class="f-flex justify-content-center">
                                <i class="fas fa-chart-pie"></i>
                                <p>
                                    Thống kê
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="fa fa-sign-out"></i>
                            <p>
                                Đăng xuất
                            </p>
                        </a>
                    </li>
                </ul>
            @endif
        </nav>
    </div>
</aside>
