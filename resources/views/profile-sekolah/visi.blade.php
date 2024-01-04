@extends('layouts.latihan')

@section('latihan-title')
    Profile - Visi Misi
@endsection

@section('latihan-content')
<section class="d-flex align-items-center" style="background: url('/assets/image/about-us.png'); height:100vh; background-size:cover;">
    <div class="row">
        <div class="col-5 offset-lg-2 offset-3 text-md-center d-none d-sm-block">
            <div class="title-3" style="color: #165690">
                Selamat Datang di SMKN 6 Balikpapan: Menyemai Ilmu, Membangun Masa Depan
            </div>
            <div class="copy mt-16">
                Selamat datang di SMKN 6 Balikpapan, tempat di mana pendidikan berkualitas tinggi menjadi landasan untuk membentuk generasi penerus yang unggul. Kami berkomitmen untuk memberikan pengalaman belajar yang menginspirasi, membangun keterampilan, dan membuka pintu menuju masa depan yang cerah bagi setiap siswa.
            </div>
        </div>
        <div class="col-10 text-center offset-1 d-sm-none d-block">
            <div class="title-3" style="color: #165690">
                Selamat Datang di SMKN 6 Balikpapan: Menyemai Ilmu, Membangun Masa Depan
            </div>
            <div class="copy mt-16">
                Selamat datang di SMKN 6 Balikpapan, tempat di mana pendidikan berkualitas tinggi menjadi landasan untuk membentuk generasi penerus yang unggul. Kami berkomitmen untuk memberikan pengalaman belajar yang menginspirasi, membangun keterampilan, dan membuka pintu menuju masa depan yang cerah bagi setiap siswa.
            </div>
        </div>
    </div>
</section>

<section class="container mt-48" id="visi">
    <div class="text-center title-3 mb-24">
        Mengapa SMKN 6 Balikpapan?
    </div>
    <div class="row row-gap-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card">
                <div class="copy m-24">
                    Menyediakan lingkungan pembelajaran yang inovatif dan relevan, melibatkan siswa dalam pengalaman praktis yang mendalam, untuk memastikan mereka memiliki keterampilan yang diperlukan di dunia nyata.
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card" style="background: #165690">
                <div class="copy m-24" style="color: white">
                    Mengembangkan karakter siswa dengan fokus pada nilai-nilai seperti integritas, tanggung jawab, dan etika kerja, sehingga mereka menjadi anggota masyarakat yang berkontribusi positif.
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card">
                <div class="copy m-24">
                    Mendorong siswa untuk berpikir kreatif, menjadi inovator, dan menghadapi perubahan dengan keberanian, sehingga mereka dapat menemukan solusi untuk tantangan masa depan.
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card">
                <div class="copy m-24">
                    Berkolaborasi dengan industri, komunitas, dan lembaga pendidikan lainnya untuk menciptakan lingkungan belajar yang dinamis dan memberikan peluang bagi siswa untuk berinteraksi dengan dunia nyata.
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-48">
    <div class="row">
        <div class="col-12 col-md-6">
            <img src="/assets/image/visi.png" class="img-fluid" alt="visi">
        </div>
        <div class="col-12 col-md-6 d-flex align-items-center">
            <div class="copy">
            "Menjadi pusat pendidikan vokasi yang unggul, menghasilkan lulusan berdaya saing global dengan keunggulan keterampilan dan integritas karakter." <br>
            Visi kami mencerminkan tekad untuk menjadi yang terdepan dalam memberikan pendidikan vokasional yang berkualitas tinggi. Kami percaya bahwa melalui pengembangan keterampilan yang relevan dan karakter yang kuat, siswa kami akan siap menghadapi tantangan dunia kerja global.
            </div>
        </div>
    </div>
</section>

<section style="background: url('/assets/image/gabung.png'); background-size: cover;" class="mb-48 mt-48">
    <div class="d-flex justify-content-center align-items-center">
        <div class="bungkus mt-48 mb-48">
            <div class="title-2 mb-16" style="color: white !important">
                Gabung bersama kami sekarang, lewat PPDB!
            </div>
            <div class="text-center">
            <a href="{{ url('https://cabdinbalikpapan.siap-ppdb.com/') }}" target="_blank" class="btn btn-secondary">
                DAFTAR SEKARANG
            </a>
            </div>
        </div>
    </div>
</section>

@endsection
