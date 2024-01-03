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
    <div class="carousel-item active" style="background: url('/image/esemka6.png'); background-size: cover; height: 100vh;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Selamat Datang Di Website SMKN 6 Balikapapn</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>

    @foreach ($carousel as $item)
        <div class="carousel-item" style="background: url('{{ asset('/storage/blogs/'.$item->photo) }}'); background-size: cover; height: 100vh">
          <img src="" class="d-block h-100" alt="carousel-photo">
          <div class="carousel-caption d-none d-md-block bg-white" style="border-radius: 24px;">
            @if(strlen($item->judul) > 40)
            <h3 class="text-black font-bold">{{ Str::substr($item->judul, 0, 40)}}...</h3>
            @else
            <h3 class="text-black font-bold">{{ $item->judul }}</h3>
            @endif

            @if(strlen($item->konten > 250))
            <p class="text-black">{{ Str::limit(strip_tags($item->konten), 250) }}...</p>
            @else
            <p class="text-black">{{ strip_tags($item->konten) }}</p>
            @endif

            <a href="{{ route('detail-blog', $item->slug) }}" class="btn btn-primary mt-8">
            Baca Selengkapnya
          </a>
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
@endsection
