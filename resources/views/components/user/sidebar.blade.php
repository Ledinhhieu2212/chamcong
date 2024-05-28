<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <span class="text-white"> Tài khoản: <b>{{ $auth->username }}</b></span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('user.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.group') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-group"></i>
                        <p>
                            Nhóm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-calendar-days"></i>
                        <p>
                            Lịch
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.calendar.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách lịch làm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.calendar.register') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đăng ký lịch làm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-stopwatch"></i>
                        <p>
                            Chấm công
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.timekeep.scanner') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chấm công mã QR</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.timekeep.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thông tin chấm công</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.salary.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill"></i>
                        <p>
                            Lương
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href=" " class="nav-link">
                        <i class="nav-icon fa-solid fa-circle-info"></i>
                        <p>
                            Trợ giúp
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
