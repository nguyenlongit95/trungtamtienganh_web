<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('/admin') }}" class="d-block">Bảng điều khiển</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <p>
                        Bảng điều khiển
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-icons"></i>
                    <p>
                        Các thành phần chính
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/admin/category') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh mục bài viết</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/admin/article') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách bài viết</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/admin/blog') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách blog cá nhân</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/admin/tags') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách tags liên kết</p>
                        </a>
                    </li>
                </ul>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="{{ url('/admin/widgets/index') }}" class="nav-link">--}}
{{--                    <i class="fas fa-text-width"></i>--}}
{{--                    <p>--}}
{{--                        Các mục mở rộng thành phần--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item has-treeview">
                <a href="{{ url('admin/contact/') }}" class="nav-link">
                    <i class="fas fa-phone-volume"></i>
                    <p>Liên hệ của người dùng</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{ url('admin/menus/index') }}" class="nav-link">
                    <i class="fas fa-bars"></i>
                    <p>Menus</p>
                </a>
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ url('admin/paygates/index') }}" class="nav-link">--}}
{{--                            <i class="fab fa-amazon-pay"></i>--}}
{{--                            <p>Paygates</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ url('admin/users/index') }}" class="nav-link">--}}
{{--                            <i class="fas fa-users"></i>--}}
{{--                            <p>Users</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ url('admin/menus/index') }}" class="nav-link">--}}
{{--                            <i class="fas fa-bars"></i>--}}
{{--                            <p>Menus</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
