<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{ asset('assets/img/a1.jpg') }}" width="100" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle " href="#">
                        <span class="clear text-center"> <span class="block m-t-xs"> <strong
                                    class="font-bold text-uppercase">
                                    {{ $admin->name }}</strong>
                            </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element text-capitalize">
                    {{ $admin->name }}
                </div>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.home' ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> <span class="nav-label">Trang chủ</span>
                </a>

            </li>
            <li class="{{ Route::currentRouteName() == 'admin.user' ? 'active' : '' }}">
                <a href="{{ route('admin.user') }}"><i class="fa fa-user"></i> <span class="nav-label">QL Nhân
                        viên</span> </a>

            </li>
            <li class="{{ Route::currentRouteName() }}">
                <a href=""><i class="fa fa-calendar"></i> <span class="nav-label">QL Lịch làm</span> </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.calendar' ? 'active' : '' }}">
                <a href="{{ route('admin.calendar') }}"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> <span class="nav-label">QL Chấm công</span> </a>
            </li>
        </ul>

    </div>
</nav>
