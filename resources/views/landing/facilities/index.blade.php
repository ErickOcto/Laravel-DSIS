@extends('layouts.latihan')

@section('latihan-title')
Profile - Fasilitas
@endsection

@section('latihan-content')


<section class="section py-100 bg-primary">
    <div class="container pt-100">
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <div class="title">
                        Fasilitas terbaik dari kami untuk anda
                    </div>
                    <div class="copy mt-24 mb-24">
                        Di SMK Negeri 6 Balikpapan, kami menawarkan fasilitas modern dan lengkap untuk mendukung pengalaman belajar yang optimal bagi siswa-siswa kami. Setiap fasilitas dirancang dengan memperhatikan kebutuhan pendidikan dan pengembangan diri. Berikut adalah sejumlah fasilitas unggulan yang dapat ditemukan di lingkungan sekolah kami:
                    </div>
                    <a href="#facility" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>
            <div class="col-6">
                <img src="/image/main.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="section py-100" id="facility">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="/image/_.jpeg" alt="" class="img-fluid">
            </div>
            <div class="col-6 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <div class="title-3">
                        Laboratorium Teknologi
                    </div>
                    <div class="copy mt-24">
                        Fasilitas ini dilengkapi dengan perangkat terbaru untuk mendukung pembelajaran di bidang teknologi, informatika, dan kejuruan. Siswa dapat mengembangkan keterampilan praktis mereka di laboratorium ini.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section py-100" id="facility#2">
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <div class="title-3">
                        Perpustakaan Modern
                    </div>
                    <div class="copy mt-24">
                        Perpustakaan kami menyediakan koleksi buku-buku terkini, referensi akademis, dan sumber daya online untuk mendukung kegiatan pembelajaran dan penelitian siswa.
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img src="/image/inter.jpeg" alt="" class="img-fluid" style="width:100%">
            </div>
        </div>
    </div>
</section>
<section class="section py-100" id="facility#3">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="/image/ruang.jpeg" alt="" class="img-fluid" style="width:100%">
            </div>
            <div class="col-6 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <div class="title-3">
                        Ruang Kelas Interaktif
                    </div>
                    <div class="copy mt-24">
                        Ruang kelas dilengkapi dengan teknologi modern, termasuk proyektor interaktif dan akses internet, menciptakan lingkungan belajar yang dinamis dan berfokus pada teknologi.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section py-100" id="facility#3">
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <div class="title-3">
                        Lapangan Olahraga
                    </div>
                    <div class="copy mt-24">
                        Untuk mendukung kesehatan dan kebugaran, SMK Negeri 6 Balikpapan memiliki lapangan olahraga lengkap dengan fasilitas untuk berbagai cabang olahraga, menciptakan ruang untuk kegiatan fisik dan rekreasi.
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img src="/image/lapangan.jpeg" alt="" class="img-fluid" style="width:100%">
            </div>
        </div>
    </div>
</section>
@endsection
