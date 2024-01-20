    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li
                class="sidebar-item {{ request()->is('student/dashboard') ? 'active' : '' }}">
                <a href="{{ route('student.dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('student/assessment*') ? 'active' : '' }}">
                <a href="{{ route('student.assessment') }}" class='sidebar-link'>
                    <i class="bi bi-tags-fill"></i>
                    <span>Nilai</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('student/book*') ? 'active' : '' }}">
                <a href="{{ route('student.book') }}" class='sidebar-link'>
                    <i class="bi bi-book-fill"></i>
                    <span>Buku Yang dipinjam</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('student/polling*') ? 'active' : '' }}">
                <a href="{{ route('student.polling.index') }}" class='sidebar-link'>
                    <i class="bi bi-calendar-event-fill"></i>
                    <span>Acara</span>
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
