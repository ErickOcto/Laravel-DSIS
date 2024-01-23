@extends('layouts.latihan')

@section('latihan-title')
Bantuan
@endsection

@section('latihan-content')
<section class="py-100">
    <div class="container" style="min-height: 50vh;">
        <div class="title-2 text-center">
            Kumpulan Bantuan dan QnA di Website SMKN6 Balikpapan
        </div>
        <div class="copy mt-24 mb-48" style="text-align: justify">
            "Tim kami siap memberikan dukungan terbaik kepada Anda! Jangan ragu untuk mengajukan pertanyaan atau mencari bantuan, karena admin kami tersedia 24/7 untuk memberikan jawaban yang Anda butuhkan. Kami memahami bahwa pertanyaan bisa muncul kapan saja, dan kami siap memberikan dukungan penuh dalam menyelesaikan setiap masalah atau pertanyaan yang Anda miliki. Hubungi kami dengan percaya diri, karena setiap pertanyaan yang Anda ajukan adalah prioritas kami. Kami menghargai nilai komunikasi dan memberikan jaminan bahwa tim kami akan merespons dengan cepat dan efektif. Kami berkomitmen untuk menjadi mitra Anda dalam setiap langkah, memberikan informasi yang jelas, dan membuat pengalaman Anda dengan kami menjadi yang terbaik. Mari berkomunikasi, kami dengan senang hati siap membantu Anda!"
        </div>
        @foreach ($helps as $key => $help)
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" style="background:#fff" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false" aria-controls="flush-collapse{{ $key }}">
                    {{ $help->name }}
                  </button>
                </h2>
                <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body" style="background: #F5F8FD">{{ $help->description }}</div>
                </div>
              </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
