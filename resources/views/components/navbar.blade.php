<nav class="navbar navbar-expand-lg bg-body-tertiary pt-24 pb-24 fixed-top">
  <div class="container">
    {{-- <img src="/image/esemka6.png" alt="" class="navbar-brand" style="max-width: 100px"> --}}
    <a href="{{ route('home') }}" class="navbar-brand d-none d-md-block">SMKN 6 BALIKPAPAN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto d-lg-flex align-items-center">
        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item mx-2 dropdown">
          <a class="nav-link {{ request()->is('profile/visi-misi') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ request()->is('profile/visi-misi') ? 'active' : '' }}" href="{{ route('profile.visi') }}">Visi & Misi</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Struktur & Organisasi</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Guru dan Tenaga Pendidikan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sarana & Prasarana</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Teaching Factory</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Gallery Foto</a></li>
          </ul>
        </li>

        <li class="nav-item mx-2 dropdown">
          <a class="nav-link {{ request()->is('majors*') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Jurusan
          </a>
          <ul class="dropdown-menu">
            @forelse ($majors as $major)
            <li><a class="dropdown-item {{ request()->is('majors/' . $major->url) ? 'active' : '' }}" href="{{ route('major', $major->url) }}">{{ $major->name }}</a></li>
            @empty
            <li><a class="dropdown-item" href="#">Tidak Ada Jurusan</a></li>
            @endforelse
          </ul>
        </li>

        <li class="nav-item mx-2 dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Informasi
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Mr. Iso</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Informasi</a></li>
          </ul>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" aria-current="page" href="{{ route('blog') }}">Berita</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" aria-current="page" href="#">Modul</a>
        </li>

        <li class="nav-item mx-2 dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Program
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Lembaga Sertifikasi Profesi</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Bursa Kerja Khusus</a></li>
          </ul>
        </li>

        @if(Auth::check())
        <form action="{{ route('logout') }}" method="POST">
        @csrf
        <li class="nav-item mx-2 dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Halo, {{ Auth::user()->name }}
          </a>
          <div class="photo" style="max-width: 48px">

          </div>
          <ul class="dropdown-menu">
            @if(!Auth::user()->is_admin)
            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard Ku</a></li>
            @else
            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Ku</a></li>
            @endif
            <button type="submit" class="dropdown-item">Logout Dari Akun</button>
          </ul>
        </li>
        </form>
        @else
        <li class="nav-item mx-2">
          <a class="btn btn-primary ms-2" aria-current="page" href="{{ route('login') }}">Login Ke Akun</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
