@extends('layouts.latihan')

@section('latihan-content')
{{-- Section 1 --}}
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/image/logo-smk1sby.png" class="d-block max-h-50 w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/image/about-us.png" class="d-block max-h-50 w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/image/logo-smk1sby.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
{{-- End Section 1 --}}
@endsection
