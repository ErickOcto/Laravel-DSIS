@extends('layouts.latihan')

@section('latihan-title')
Blog - {{ $blog->judul }}
@endsection
@section('latihan-content')
<div class="container">
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
</div>
@endsection
