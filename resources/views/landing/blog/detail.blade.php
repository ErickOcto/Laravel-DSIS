@extends('layouts.latihan')

@section('latihan-title')
Blog - {{ $blog->judul }}
@endsection
@section('latihan-content')
<section class="container" style="margin-top: 120px">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-48 text-center">
                {{ $blog->judul }}
            </h1>
            <div class="text-center">
                @if($blog->photo)
                <img src="{{ asset('/storage/blogs/' . $blog->photo) }}" class="rounded" style="max-width: 500px" alt="{{ $blog->judul }}">
                @else
                <img src="{{ asset('/users/no-image.jpeg') }}" style="max-width: 300px; border-radius:50%" alt="{{ $blog->judul }}">
                @endif
            </div>
            <p class="copy mt-48">
                {{ strip_tags($blog->konten) }}
            </p>
        </div>
    </div>
</section>

{{-- Blog Lainnya --}}
<section class="container my-100">
    <div class="d-flex justify-content-between align-items-center mb-24" id="fitur-kita">
        <div class="kiri">
            <div class="title-3 mb-8">
                Blog Terbaru
            </div>
            <div class="subtitle-2">
                Blog paling terakhir ditambahkan
            </div>
        </div>
        <div class="kanan">
            <a href="#terbanyak" class="lihat-selengkapnya">Lihat selengkapnya</a>
        </div>
    </div>
    <div class="row" id="terbanyak">
        @foreach ($latests as $key => $blog)
            <div class="col-12 col-md-6 col-lg-3"
                data-aos="zoom-in-up"
                data-aos-delay="{{ $key++ }}00"
                data-aos-duration="1000"
            >
                <form action="{{ route('update-lihat', $blog->id) }}" method="POST" class="update-form" style="text-decoration: none">
                    @csrf
                    @method('PUT')
                <div class="card blog">
                    @if($blog->photo)
                    <div class="card-img-top" alt="gambar" style="background: url('{{ asset('/storage/blogs/' . $blog->photo) }}'); height: 200px; background-size:cover; border-top-left-radius:24px; border-top-right-radius:24px;"></div>
                    @else
                    <div class="card-img-top" alt="gambar" style="background: url('{{ asset('/users/no-image.jpeg') }}'); height: 200px; background-size:cover; border-top-left-radius:24px; border-top-right-radius:24px;"></div>
                    @endif
                    <div class="card-body">
                        <div class="title-5 mb-8">
                            {{ Str::limit($blog->judul, 25) }}
                        </div>
                        <div class="copy mb-8">
                            Tanggal : {{ $blog->created_at }}
                        </div>
                        <div class="copy">
                            Oleh : {{ $blog->User->name }}
                        </div>
                        <div class="d-flex align-items-center mt-8">
                            <i class="bi bi-eye me-2"></i><div class="copy">{{ $blog->lihat }} kali dilihat</div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <button type="submit" style="border:0px;" class="footer-card">
                        <div class="title-6 text-center pt-16 pb-16">
                            Baca Selengkapnya
                        </div>
                    </button>
                </div>
                </form>
            </div>
        @endforeach($i = 0; $i < 4; $i++)
    </div>
    {{-- {{ $latests->links() }} --}}
</section>
{{-- End Blog Lainnya --}}
@endsection
