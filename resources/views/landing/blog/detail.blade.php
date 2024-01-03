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
                <img src="{{ asset('/storage/blogs/' . $blog->photo) }}" class="img-fluid" alt="{{ $blog->slug }}">
            </div>
            <p class="copy mt-48">
                {{ strip_tags($blog->konten) }}
            </p>
        </div>
    </div>
</section>

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
                <a href="{{ route('detail-blog', $blog->slug) }}" style="text-decoration: none">
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
                    <a href="{{ route('detail-blog', $blog->slug) }}" style="" class="footer-card">
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
