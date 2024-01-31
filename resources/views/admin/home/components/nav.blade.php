<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center"> <span>
                        <img alt="image" class="img-circle" width="60" src="{{asset('assets/img/avatar-admin.png')}}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <h2 class="block m-t-xs"> <strong class="font-bold text-uppercase">Admin</strong>
                        </h2>
                        </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs    ">
                        <li><a href="profile.html">Thông tin tài khoản</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('admin.logout')}}">Đăng xuất</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                   Admin
                </div>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Quản lý nhân viên</span> <span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('admin.user')}}">Thông tin nhân viên</a></li>
                    <li><a href="dashboard_2.html">Dashboard v.2</a></li>
                    <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                    <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                    <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
                </ul>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Quản lý chấm công</span> <span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="index.html">Lịch chấm công</a></li>
                    <li><a href="dashboard_2.html">Dashboard v.2</a></li>
                    <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                    <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                    <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
