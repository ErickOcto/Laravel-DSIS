    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li
                class="sidebar-item {{ request()->is('teacher/dashboard') ? 'active' : '' }}">
                <a href="{{ route('teacher.dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-title">Manajemen Buku</li>

            <li
                class="sidebar-item {{ request()->is('teacher/assessment*') ? 'active' : '' }}">
                <a href="{{ route('teacher.assessment.index') }}" class='sidebar-link'>
                    <i class="bi bi-pass-fill"></i>
                    <span>Penilaian</span>
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
