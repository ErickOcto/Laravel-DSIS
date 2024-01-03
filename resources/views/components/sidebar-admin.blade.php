    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li
                class="sidebar-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-title">Manajemen Blog</li>

            <li
                class="sidebar-item {{ request()->is('admin/category*') ? 'active' : '' }}">
                <a href="{{ route('admin.category.index') }}" class='sidebar-link'>
                    <i class="bi bi-tags-fill"></i>
                    <span>Category</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('admin/blog*') ? 'active' : '' }}">
                <a href="{{ route('admin.blog.index') }}" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                    <span>Blog</span>
                </a>
            </li>

            <li class="sidebar-title">Manajemen Pengguna</li>

            <li
                class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>Daftar Pengguna</span>
                </a>
            </li>

        </ul>
    </div>
