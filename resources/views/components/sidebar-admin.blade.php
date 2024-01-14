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

            <li
                class="sidebar-item {{ request()->is('admin/officer*') ? 'active' : '' }}">
                <a href="{{ route('admin.officer.index') }}" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>Daftar Petugas</span>
                </a>
            </li>

            <li class="sidebar-title">Manajemen Profile</li>

            <li
                class="sidebar-item {{ request()->is('admin/majors*') ? 'active' : '' }}">
                <a href="{{ route('admin.majors.index') }}" class='sidebar-link'>
                    <i class="bi bi-subtract"></i>
                    <span>Daftar Jurusan</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('admin/classroom*') ? 'active' : '' }}">
                <a href="{{ route('admin.classroom.index') }}" class='sidebar-link'>
                    <i class="bi bi-subtract"></i>
                    <span>Daftar Kelas</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('admin/subject*') ? 'active' : '' }}">
                <a href="{{ route('admin.subject.index') }}" class='sidebar-link'>
                    <i class="bi bi-list-task"></i>
                    <span>Daftar Mata Pelajaran</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('admin/gallery*') ? 'active' : '' }}">
                <a href="{{ route('admin.gallery.index') }}" class='sidebar-link'>
                   <i class="bi bi-image-fill"></i>
                    <span>Daftar Gallery</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('admin/help*') ? 'active' : '' }}">
                <a href="{{ route('admin.help.index') }}" class='sidebar-link'>
                    <i class="bi bi-question-circle-fill"></i>
                    <span>Daftar QnA</span>
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
