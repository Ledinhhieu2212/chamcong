<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="min-height: 100%;">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <div class="text-center brand-text block">

            <img @if (file_exists(public_path("assets/img/$user_accoutn->image"))) src="{{ asset("assets/img/$user_accoutn->image") }}"
                        @else
                            src="{{ $user_accoutn->image }}" @endif
                class=" rounded-circle avatar" width="100" height="100" alt="" />
        </div>
        <div class="brand-text font-weight-light text-center">{{ $user_accoutn->username }}</div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <div class="f-flex justify-content-center">
                            <p> Thông tin
                            </p>
                        </div>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="" class="nav-link">
                        <p>
                            QL làm việc <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
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
                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/uplot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('timekeep') }}" class="nav-link">
                        <p>
                            Chấm công
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('timekeep') }}" class="nav-link">
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
