@extends('layouts.admin')

@section('admin-title')
Admin Dashboard
@endsection

@section('admin-header')
Admin Dashboard
@endsection

@section('admin-content')
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4>Top 3 Blog Terpopuler</h4>
            </div>
            <div class="card-content pb-4">
                @forelse ($popularBlogs as $item)
                <a href="{{ route('detail-blog', $item->slug) }}" class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{ asset('/storage/blogs/' . $item->photo) }}" class="rounded">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">{{ Str::limit($item->judul, 25) }}</h5>
                        <h6 class="text-muted mb-0">{{ $item->User->name }}</h6>
                    </div>
                </a>
                @empty

                @endforelse
                <div class="px-4">
                    <a href="{{ route('admin.blog.index') }}" class='btn btn-block btn-outline-primary font-bold mt-3'>Lihat Semua Blog</a>
                </div>
            </div>
        </div>
    </div>
@endsection
