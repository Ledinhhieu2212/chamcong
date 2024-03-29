<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="min-height: 100%;">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <span class="brand-text font-weight-light text-center">Tài khoản: {{ $admin->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ Route::currentRouteName() == 'admin.home' ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <div class="f-flex justify-content-center">
                            <i class="fa fa-home  "></i>
                            <p >
                                Trang chủ
                            </p>
                        </div>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('admin.user.create') }}" class="nav-link">

                        <div class="f-flex justify-content-center">
                            <i class="fa fa-user  "></i>
                            <p > Nhân viên
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
        </nav>
    </div>
</aside>
