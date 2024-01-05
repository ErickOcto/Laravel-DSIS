@extends('layouts.latihan')


@section('latihan-title')
Blog Dan Berita
@endsection
@section('latihan-content')
<section class="d-flex justify-content-center align-items-center" style="margin-top:100px; background: url('assets/image/gabung.png'); background-size:cover; height: 208px">
    <div class="title">
        Blog dan Berita
    </div>
</section>

{{-- Blog Lainnya --}}
<section class="container my-100">
    <div class="d-flex justify-content-between align-items-center mb-24" id="fitur-kita">
        <div class="kiri">
            <div class="title-3 mb-8">
                Blog Terpopuler
            </div>
            <div class="subtitle-2">
                Blog paling banyak dilihat
            </div>
        </div>
        <div class="kanan">
            <a href="#populer" class="lihat-selengkapnya">Lihat selengkapnya</a>
        </div>
    </div>
    <div class="row" id="populer">
        @foreach ($blogs as $key => $blog)
            <div class="col-12 col-md-6 col-lg-3"
                data-aos="zoom-in-up"
                data-aos-delay="{{ $key++ }}00"
                data-aos-duration="1000"
            >

                <form action="{{ route('update-lihat', $blog->id) }}" method="POST" class="update-form" style="text-decoration: none">
                    @csrf
                    @method('PUT')
                <div class="card blog">
                    <div class="card-img-top" alt="gambar" style="background: url('{{ asset('/storage/blogs/' . $blog->photo) }}'); height: 200px; background-size:cover; border-top-left-radius:24px; border-top-right-radius:24px;"></div>
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
                    </div>
                    <div class="divider"></div>
                    <button type="submit" style="border:0px;" class="footer-card">
                        <div class="title-6 text-center pt-16 pb-16">
                            Baca Selengkapnya
                        </div>
                    </button>
                </div>
                </form>
                </a>
            </div>
        @endforeach($i = 0; $i < 4; $i++)
    </div>
    {{-- {{ $latests->links() }} --}}
</section>
{{-- End Blog Lainnya --}}

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
                    <div class="card-img-top" alt="gambar" style="background: url('{{ asset('/storage/blogs/' . $blog->photo) }}'); height: 200px; background-size:cover; border-top-left-radius:24px; border-top-right-radius:24px;"></div>
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
