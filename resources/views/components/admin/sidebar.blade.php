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
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.position.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-podcast"></i>
                        <p>
                            Quản lý chức vụ
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-users-gear"></i>
                        <p>
                            Quản lý nhân viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.qrcode.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-qrcode"></i>
                        <p>
                            Quản lý QRcode
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.calendar.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-calendar-days"></i>
                        <p>
                            Quản lý ngày làm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.timekeep.index') }}" class="nav-link">
                        <i class="nav-icon  fa-regular fa-calendar-xmark"></i>
                        <p>
                            Quản lý chấm công
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.qrcode.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Quản lý báo cáo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.qrcode.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill"></i>
                        <p>
                            Quản lý lương
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
