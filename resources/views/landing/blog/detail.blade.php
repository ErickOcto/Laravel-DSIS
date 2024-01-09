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
                <img src="{{ asset('/users/user_pp_default.jpeg') }}" style="max-width: 300px; border-radius:50%" alt="{{ $blog->judul }}">
                @endif
            </div>
            <p class="copy mt-48">
                {{ strip_tags($blog->konten) }}
            </p>
        </div>
    </div>
</section>
@endsection
