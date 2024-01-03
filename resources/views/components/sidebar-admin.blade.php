    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li
                class="sidebar-item {{ request()->is('super-admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-title">Manajemen UMKM</li>

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-calendar-event-fill"></i>
                    <span>Acara</span>
                </a>

                <ul class="submenu ">
                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Acara</a>
                    </li>
                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Pelatihan</a>
                    </li>
                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Bimbingan</a>
                    </li>

                </ul>
            </li>

            <li
                class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-cup-straw"></i>
                    <span>Foodcourt</span>
                </a>
            </li>

            <li
                class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-patch-check-fill"></i>
                    <span>Sertifikasi UMKM</span>
                </a>
            </li>

            <li
                class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-cash-stack"></i>
                    <span>Pajak</span>
                </a>
            </li>

            <li class="sidebar-title">Manajemen Blog</li>

            <li
                class="sidebar-item">
                <a href="{{ route('super-admin.kategori.index') }}" class='sidebar-link'>
                    <i class="bi bi-tags-fill"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ request()->is('super-admin/manajemen-blog/blog*') ? 'active' : '' }}">
                <a href="{{ route('super-admin.blog.index') }}" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                    <span>Blog</span>
                </a>
            </li>

            <li class="sidebar-title">Manajemen Ecommerce</li>

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-fire"></i>
                    <span>Trending</span>
                </a>

                <ul class="submenu ">
                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Produk</a>
                    </li>

                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Kategori</a>
                    </li>

                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Tag</a>
                    </li>
                </ul>
            </li>

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                    <span>Rekomendasi</span>
                </a>

                <ul class="submenu ">
                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Produk</a>
                    </li>

                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Kategori</a>
                    </li>

                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Brand UMKM</a>
                    </li>
                </ul>
            </li>

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-journal-text"></i>
                    <span>Laporan</span>
                </a>

                <ul class="submenu ">
                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Transaksi</a>
                    </li>

                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Penjualan</a>
                    </li>

                    <li class="submenu-item  ">
                        <a href="component-modal.html" class="submenu-link">Pemasukan</a>
                    </li>
                </ul>
            </li>


            <li class="sidebar-title">Manajemen Pengguna</li>

            <li
                class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Mitra</span>
                </a>
            </li>

            <li
                class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>UMKM</span>
                </a>
            </li>

            <li
                class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>Daftar Pengguna</span>
                </a>
            </li>

        </ul>
    </div>
