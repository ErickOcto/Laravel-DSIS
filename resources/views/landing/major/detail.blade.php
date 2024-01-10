@extends('layouts.latihan')

@section('latihan-title')
Jurusan {{ $major->name }}
@endsection

@section('latihan-content')
<section class="container my-100">
    <div class="title-2">
        Jurusan : {{ $major->name }}
    </div>
</section>
<section class="container my-48">
    <div class="text-center">
        @if($major->photo)
        <img src="{{ asset('/storage/majors/' . $major->photo) }}" alt="" style="max-height: 300px; border-radius:50%">
        @else
        <img src="{{ asset('/users/user_pp_default.jpeg') }}" alt="" style="max-height: 300px; border-radius:50%">
        @endif

    </div>
</section>
<section class="container my-100">
    <div class="copy">
        {{ $major->description }}
    </div>
</section>
@endsection
