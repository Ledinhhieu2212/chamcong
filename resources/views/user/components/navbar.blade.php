<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="min-height: 100%;">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <div class="text-center brand-text block">
            <img src="{{ asset("assets/img/$user_accoutn->image") }}" class=" rounded-circle" width="100" height="100" alt="">
        </div>
        <div class="brand-text font-weight-light text-center">{{ $user_accoutn->username }}</div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fa fa-home  mr-3"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <div class="f-flex justify-content-center">
                            <i class="fa fa-user  mr-3"></i>
                            <p > Thông tin
                            </p>
                        </div>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('calendar') }}" class="nav-link">
                        <i class="fa fa-calendar mr-3"></i>
                        <p>
                            Lịch làm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('timekeep') }}" class="nav-link">
                        <i class="fa-solid fa-calendar-xmark mr-3"></i>
                        <p>
                            Chấm công
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('timekeep') }}" class="nav-link">
                        <i class="fas fa-chart-pie  mr-3"></i>
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="fa fa-sign-out mr-3"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
