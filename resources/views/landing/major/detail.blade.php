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
        <img src="{{ asset('/storage/majors/' . $major->photo) }}" alt="" style="max-height: 300px">
    </div>
</section>
<section class="container my-100">
    <div class="copy">
        {{ $major->description }}
    </div>
</section>
@endsection
