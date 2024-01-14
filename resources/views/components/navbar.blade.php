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
          <a class="nav-link {{ request()->is('profile*') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ request()->is('profile/visi-misi') ? 'active' : '' }}" href="{{ route('profile.visi') }}">Visi & Misi</a></li>
            <li><a class="dropdown-item {{ request()->is('profile/teachers*') ? 'active' : '' }}" href="{{ route('teachers') }}">Guru dan Tenaga Pendidikan</a></li>
            <li><a class="dropdown-item {{ request()->is('profile/facilities*') ? 'active' : '' }}" href="{{ route('facilities') }}">Sarana & Prasarana</a></li>
            <li><a class="dropdown-item {{ request()->is('profile/gallery*') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery Foto</a></li>
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

        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" aria-current="page" href="{{ route('blog') }}">Berita</a>
        </li>

        @if(Auth::check())
        <form action="{{ route('logout') }}" method="POST">
        @csrf
        <li class="nav-item mx-2 dropdown d-flex align-items-center">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Halo, {{ Str::of(Auth::user()->name)->explode(' ')[0] }}
          </a>
          <div class="ms-3 photo">
            @if(Auth::user()->image)
            <img src="/storage/users/{{ Auth::user()->image }}" alt="gambar-user" style="max-width: 48px; border-radius:50%">
            @else
            <img src="/users/user_pp_default.jpeg" alt="gambar-user" class="border-2" style="max-width: 48px; border-radius:50%; border:1px;">
            @endif
          </div>
          <ul class="dropdown-menu">
            @if(Auth::user()->is_admin === 2)
            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard Ku</a></li>
            @elseif(Auth::user()->is_admin === 1)
            <li><a class="dropdown-item" href="{{ route('teacher.dashboard') }}">Dashboard Ku</a></li>
            @elseif(Auth::user()->is_admin === 0)
            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Ku</a></li>
            @elseif(Auth::user()->is_admin === 3)
            <li><a class="dropdown-item" href="{{ route('officer.dashboard') }}">Dashboard Ku</a></li>
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
