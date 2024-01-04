@extends('layouts.latihan')

@section('latihan-content')
{{-- Section 1 --}}
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    @foreach ($carousel as $item)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->iteration }}" aria-label="Slide {{ $loop->iteration + 1 }}"></button>
    @endforeach

  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="background: url('/image/esemka6.png'); background-size: cover; height: 70vh;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Selamat Datang Di Website SMKN 6 Balikapapn</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>

    @foreach ($carousel as $item)
        <div class="carousel-item" style="background: url('{{ asset('/storage/blogs/'.$item->photo) }}'); background-size: cover; height: 70vh">
          <img src="" class="d-block h-100" alt="carousel-photo">
          <div class="carousel-caption d-none d-md-block bg-white" style="border-radius: 24px;">
            @if(strlen($item->judul) > 40)
            <h3 class="text-black font-bold">{{ Str::substr($item->judul, 0, 40)}}...</h3>
            @else
            <h3 class="text-black font-bold">{{ $item->judul }}</h3>
            @endif

            @if(strlen($item->konten > 200))
            <p class="text-black">{{ Str::limit(strip_tags($item->konten), 200) }}...</p>
            @else
            <p class="text-black">{{ strip_tags($item->konten) }}</p>
            @endif

            <form action="{{ route('update-lihat', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <a href="{{ route('detail-blog', $item->slug) }}" class="btn btn-primary mt-8">
                    {{-- <button type="submit">Baca Selengkapnya</button> --}}
                    Baca Selengkapnya
                </a>
            </form>
          </div>
        </div>
    @endforeach

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
{{-- End Section 1 --}}

{{-- Mitra Kami --}}
<section class="container my-100 d-none d-md-block">
    <div class="d-flex justify-content-between align-items-center mt-24">
        <div class="kiri">
            <div class="title-3 mb-8">
                Dipercaya Perusahaan
            </div>
            <div class="subtitle-2">
                Perusahaan Yang Mempercayai Alumni Kami
            </div>
        </div>
        <div class="kanan">
            <a href="#" class="lihat-selengkapnya">Lihat selengkapnya</a>
        </div>
    </div>

    <div class=" d-flex justify-content-evenly mt-24">
        <img src="/assets/image/mitra/bca.png" class="gambar-mitra d-none d-md-block" alt="bca">
        <img src="/assets/image/mitra/tokped.png" class="gambar-mitra d-none d-md-block" alt="tokopedia">
        <img src="/assets/image/mitra/bli.png" class="gambar-mitra d-none d-md-block" alt="blibli">
        <img src="/assets/image/mitra/1000.png" class="gambar-mitra d-none d-md-block" alt="1000-startup">
        <img src="/assets/image/mitra/kominfo.png" class="gambar-mitra d-none d-md-block" alt="kominfo">
        <img src="/assets/image/mitra/logo-pemkot.png" class="gambar-mitra d-none d-md-block" alt="pemkot-balikpapan">
    </div>

</section>
{{-- End Mitra Kami --}}

{{-- Mitra KAmi Mobile --}}
<section class="my-100 d-md-none d-sm-block">
    <div class="container d-flex justify-content-between align-items-center mt-24">
        <div class="kiri">
            <div class="title-3 mb-8">
                Dipercaya Perusahaan
            </div>
            <div class="subtitle-2">
                Perusahaan Yang Mempercayai Alumni Kami
            </div>
        </div>
        <div class="kanan">
            <a href="#" class="lihat-selengkapnya">Lihat selengkapnya</a>
        </div>
    </div>
    <div class="carousel-right mb-30">
        <div class="carousel-wrapper-right">
            <div class="card-brand mr-30">
              <img src="/assets/image/mitra/1000.png" class="logo" alt="harvard">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/bca.png" class="logo" alt="monash">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/bli.png" class="logo" alt="stanford">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/kominfo.png" class="logo" alt="uw">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/logo-pemkot.png" class="logo" alt="oxford">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/tokped.png" class="logo" alt="NTU">
            </div>
        </div>
        <div class="carousel-wrapper-right">
            <div class="card-brand mr-30">
              <img src="/assets/image/mitra/1000.png" class="logo" alt="harvard">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/bca.png" class="logo" alt="monash">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/bli.png" class="logo" alt="stanford">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/kominfo.png" class="logo" alt="uw">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/logo-pemkot.png" class="logo" alt="oxford">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/tokped.png" class="logo" alt="NTU">
            </div>
        </div>
        <div class="carousel-wrapper-right">
            <div class="card-brand mr-30">
              <img src="/assets/image/mitra/1000.png" class="logo" alt="harvard">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/bca.png" class="logo" alt="monash">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/bli.png" class="logo" alt="stanford">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/kominfo.png" class="logo" alt="uw">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/logo-pemkot.png" class="logo" alt="oxford">
            </div>
              <div class="card-brand mr-30">
              <img src="/assets/image/mitra/tokped.png" class="logo" alt="NTU">
            </div>
        </div>
    </div>
</section>
{{-- End Mitra Kami Mobile --}}

{{-- Section 2 --}}
<section class="container my-100">
    <div class="row d-flex align-items-center">
        <div class="col-7">
            <div class="title-4 mb-8">
                Sambutan Kepala Sekolah
            </div>
            <div class="title-2 mb-24" style="color: #1e1e1e">
                MELANGKAH MENUJU PRESTASI
            </div>
            <div class="copy mb-24">
                Mengembangkan bidang keahlian Teknologi Informasi dan Komunikasi, Memberikan kontribusi bagi percepatan pembangunan di Kalimantan Timur, Mengembangkan manajemen pendidikan berbasis sekolah secara pro aktif dan kreatif, dan Memacu perkembangan pendidikan yang lebih kompetitif dan mandiri.
            </div>
            <img src="/image/signature.png" class="mb-24" alt="">
            <div class="title-6">
                Anda Supanda, S.Pd., M.Pd.

            </div>
            <div class="copy">
                Kepala SMK Negeri 7 Samarinda
            </div>
        </div>
        <div class="col-5">
            <img src="/image/kepsek.png" alt="" class="img-fluid">
        </div>
    </div>
</section>
{{-- End Section 2 --}}
@endsection
