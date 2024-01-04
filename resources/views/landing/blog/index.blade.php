@extends('layouts.latihan')


@section('latihan-title')
Blog Dan Berita
@endsection
@section('latihan-content')
<section class="d-flex justify-content-center align-items-center" style="margin-top:100px; background: url('assets/image/layanan.png'); background-size:cover; height: 208px">
    <div class="title">
        Blog dan Berita
    </div>
</section>

{{-- Blog terpopuler --}}
<section class="container mt-48">
    <div class="d-flex justify-content-start align-items-center mb-24" id="fitur-kami">
        <div class="kiri">
            <div class="title-3 mb-8">
                Blog Terpopuler
            </div>
            <div class="subtitle-2">
                Blog paling banyak dibaca
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($blogs as $key => $blog)
            <div class="col-12 col-md-6 col-lg-3"
                data-aos="zoom-in-up"
                data-aos-delay="{{ $key++ }}00"
                data-aos-duration="1000"
            >
                <a href="#" style="text-decoration: none">
                <div class="card blog">
                    <div class="card-img-top" alt="gambar" style="background: url('/assets/image/header-content.png'); height: 200px; background-size:cover; border-top-left-radius:24px; border-top-right-radius:24px;"></div>
                    <div class="card-body">
                        <div class="title-5 mb-8">
                            {{ $blog->judul }}
                        </div>
                        <div class="copy mb-8">
                            Tanggal : {{ $blog->created_at }}
                        </div>
                        <div class="copy">
                            Oleh : {{ $blog->User->name }}
                        </div>
                    </div>
                    <div class="divider"></div>
                    <a href="#" style="" class="footer-card">
                        <div class="title-6 text-center pt-16 pb-16">
                            Baca Selengkapnya
                        </div>
                    </a>
                </div>
                </a>
            </div>
        @endforeach($i = 0; $i < 4; $i++)
    </div>
</section>
{{-- End Blog terpopuler --}}

{{-- Blog terbaru --}}
<section class="container mt-48 mb-48">
    <div class="d-flex justify-content-start align-items-center mb-24" id="fitur-kita">
        <div class="kiri">
            <div class="title-3 mb-8">
                Blog Terbaru
            </div>
            <div class="subtitle-2">
                Blog paling baru diupload
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($latests as $key => $blog)
            <div class="col-12 col-md-6 col-lg-3"
                data-aos="zoom-in-up"
                data-aos-delay="{{ $key++ }}00"
                data-aos-duration="1000"
            >
                <a href="#" style="text-decoration: none">
                <div class="card blog">
                    <div class="card-img-top" alt="gambar" style="background: url('/assets/image/header-content.png'); height: 200px; background-size:cover; border-top-left-radius:24px; border-top-right-radius:24px;"></div>
                    <div class="card-body">
                        <div class="title-5 mb-8">
                            {{ $blog->judul }}
                        </div>
                        <div class="copy mb-8">
                            Tanggal : {{ $blog->created_at }}
                        </div>
                        <div class="copy">
                            Oleh : {{ $blog->User->name }}
                        </div>
                    </div>
                    <div class="divider"></div>
                    <a href="#" style="" class="footer-card">
                        <div class="title-6 text-center pt-16 pb-16">
                            Baca Selengkapnya
                        </div>
                    </a>
                </div>
                </a>
            </div>
        @endforeach($i = 0; $i < 4; $i++)
    </div>
    {{-- {{ $latests->links() }} --}}
</section>
{{-- End Blog terbaru --}}

{{-- Blog Lainnya --}}
<section class="container mt-48 mb-48">
    <div class="d-flex justify-content-start align-items-center mb-24" id="fitur-kita">
        <div class="kiri">
            <div class="title-3 mb-8">
                Blog Lainnya
            </div>
            <div class="subtitle-2">
                Blog paling baru diupload
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($latests as $key => $blog)
            <div class="col-12 col-md-6 col-lg-3"
                data-aos="zoom-in-up"
                data-aos-delay="{{ $key++ }}00"
                data-aos-duration="1000"
            >
                <a href="#" style="text-decoration: none">
                <div class="card blog">
                    <div class="card-img-top" alt="gambar" style="background: url('/assets/image/header-content.png'); height: 200px; background-size:cover; border-top-left-radius:24px; border-top-right-radius:24px;"></div>
                    <div class="card-body">
                        <div class="title-5 mb-8">
                            {{ $blog->judul }}
                        </div>
                        <div class="copy mb-8">
                            Tanggal : {{ $blog->created_at }}
                        </div>
                        <div class="copy">
                            Oleh : {{ $blog->User->name }}
                        </div>
                    </div>
                    <div class="divider"></div>
                    <a href="#" style="" class="footer-card">
                        <div class="title-6 text-center pt-16 pb-16">
                            Baca Selengkapnya
                        </div>
                    </a>
                </div>
                </a>
            </div>
        @endforeach($i = 0; $i < 4; $i++)
    </div>
    {{-- {{ $latests->links() }} --}}
</section>
{{-- End Blog Lainnya --}}
@endsection
