@extends('layouts.latihan')

@section('latihan-title')
Profile - Galeri
@endsection

@section('latihan-content')
<section class="section py-100">
    <div class="container pt-100">
        <div class="row g-3">
            @for($i = 0; $i < 12; $i++)
                <div class="col-3">
                    <img src="/image/_.jpeg" alt="" class="img-fluid rounded-4" style="width: 100%">
                </div>
            @endfor
        </div>
    </div>
</section>
@endsection
