@extends('layouts.latihan')

@section('latihan-title')
Blog - {{ $teacher->name }}
@endsection
@section('latihan-content')
<section class="container" style="margin-top: 120px">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-48 text-center">
                {{ $teacher->name }}
            </h1>
            <div class="text-center">
                @if($teacher->image)
                <img src="{{ asset('/storage/users/' . $teacher->image) }}" style="max-width: 300px; border-radius:50%" alt="{{ $teacher->name }}">
                @else
                <img src="{{ asset('/users/user_pp_default.jpeg') }}" style="max-width: 300px; border-radius:50%" alt="{{ $teacher->name }}">
                @endif
            </div>
            <p class="copy mt-48">
                {{ strip_tags($teacher->bio) }}
            </p>
        </div>
    </div>
</section>
@endsection
