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
                class="sidebar-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                <a href="{{ route('admin.user.index') }}" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>Daftar Siswa</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('admin/teacher*') ? 'active' : '' }}">
                <a href="{{ route('admin.teacher.index') }}" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>Daftar Guru</span>
                </a>
            </li>

            <li class="sidebar-title">Manajemen Jurusan</li>

            <li
                class="sidebar-item {{ request()->is('admin/majors*') ? 'active' : '' }}">
                <a href="{{ route('admin.majors.index') }}" class='sidebar-link'>
                    <i class="bi bi-subtract"></i>
                    <span>Daftar Jurusan</span>
                </a>
            </li>

            <li class="sidebar-title">Akun</li>

            <li
                class="sidebar-item">
                <a href="{{ route('profile.edit') }}" class='sidebar-link'>

                    <span>Setelan Akun</span>
                </a>
            </li>

        </ul>
    </div>
