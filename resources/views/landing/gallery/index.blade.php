@extends('layouts.latihan')

@section('latihan-title')
Profile - Galeri
@endsection

@section('latihan-content')
<section class="section py-100" style="min-height: 70vh">
    <div class="container pt-100" >
        <div class="row g-3">
            @foreach ($galleries as $key => $gallery)
                <div class="col-3 d-grid" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen-{{ $key }}">
                    <div class="rounded-4" style="height: 200px; background:url('{{ asset('/storage/gallery/' . $gallery->image) }}'); background-size:cover"></div>
                </div>
                {{-- Modal --}}
                <div class="modal fade" id="exampleModalFullscreen-{{ $key }}" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel-{{ $key }}" aria-hidden="true" style="margin: 0; padding:0">
                  <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-4" id="exampleModalFullscreenLabel-{{ $key }}">{{ $gallery->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="rounded-4" style="height: 100%; background:url('{{ asset('/storage/gallery/' . $gallery->image) }}'); background-size:cover"></div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('add-script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach(function (item) {
                item.addEventListener('click', function () {
                    var targetModalId = this.getAttribute('data-bs-target');
                    var targetModal = document.querySelector(targetModalId);

                    var modal = new bootstrap.Modal(targetModal);
                    modal.show();
                });
            });
        });
    </script>
@endpush
