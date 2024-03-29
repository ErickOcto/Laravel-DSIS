<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    {{-- Bootstrap --}}
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800;900;&display=swap"
      rel="stylesheet"
    />

    {{-- Styling WIRABA --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
{{-- Section --}}


<section class="container" style="display:flex; align-items:center; justify-content:center; min-height:100vh;">
    <div class="">
        <div class="navbar-brand text-center mb-48 mt-48">
            SMKN 6 Balikpapan
        </div>
        <form action="{{ route('register') }}" class="card mb-48" method="POST" style="min-width: 418px" >
            @csrf
            <div class="m-24">
                <div class="title-3-blue mb-8">
                    Daftarkan Akun anda
                </div>
                <p class="subtitle-2 mb-24" style="color: #000">
                    Silahkan Masukkan data dibawah
                </p>
                <div class="mb-24">
                  <label for="formInputName" class="form-label title-5-input">Nama</label>
                  <input type="text" class="form-control" id="formInputName" name="name" placeholder="Masukkan nama" required >
                </div>
                <div class="mb-24">
                  <label for="formInputEmail" class="form-label title-5-input">Email</label>
                  <input type="email" class="form-control" id="formInputEmail" name="email" placeholder="Masukkan email" required >
                </div>
                <div class="mb-24">
                  <label for="formInputPassword" class="form-label title-5-input">Password</label>
                  <input type="password" class="form-control" id="formInputPassword" name="password" placeholder="Masukkan password" required >
                </div>
                <div class="mb-24">
                  <label for="formInputPasswordConfirm" class="form-label title-5-input">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="formInputPasswordConfirm" placeholder="Masukkan ulang password" name="password_confirmation" required autocomplete="new-password">
                </div>
                {{-- <div class="form-check mb-24">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked onchange="toggleDiv()">
                  <label class="form-check-label" for="flexCheckChecked">
                    Daftarkan Usaha Anda
                  </label>
                </div>

                <div id="kuma">
                    <div class="mb-24">
                      <label for="formInputNameTOko" class="form-label title-5-input">Nama Toko</label>
                      <input type="text" class="form-control" id="formInputNameTOko" name="store_name" placeholder="Masukkan nama toko" required >
                    </div>
                    <div class="mb-24">
                      <label for="formInputDescription" class="form-label title-5-input">Deskripsi Toko</label>
                      <input type="text" class="form-control" id="formInputDescription" name="store_desc" placeholder="Masukkan deskripsi toko" required >
                    </div>
                    <div class="mb-24">
                        <label for="" class="form-label title-5-input">Provinsi</label>
                        <select class="form-select" name="province_id" aria-label="Default select example" required>
                          <option disabled>Pilih Provinsi</option>

                        </select>
                    </div>
                    <div class="mb-24">
                        <label for="" class="form-label title-5-input">Kecamatan</label>
                        <select class="form-select" name="province_id" aria-label="Default select example" required>
                          <option disabled>Pilih Kecamatan</option>

                        </select>
                    </div>
                    <div class="mb-24">
                      <label for="formInputTelp" class="form-label title-5-input">Nomor Telepon</label>
                      <input type="number" class="form-control" id="formInputTelp" name="no_telp" placeholder="Masukkan nomor hp" required >
                    </div>
                    <div class="mb-24">
                      <label for="" class="form-label title-5-input">Alamat Lengkap</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan alamat" required></textarea>
                    </div>
                </div> --}}

                <div class="d-flex justify-content-end align-items-center">
                    <a href="/login" class="btn btn-secondary">
                    Sudah Memiliki Akun</a>
                    <button class="btn btn-primary ml-24">
                        Daftarkan Akun
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>


{{-- End Section --}}
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
          AOS.init();
        </script>
        <script>
      function toggleDiv() {
        var kumaDiv = document.getElementById("kuma");
        var checkbox = document.getElementById("flexCheckChecked");

        if (checkbox.checked) {
          kumaDiv.style.display = "block"; // Menampilkan div
        } else {
          kumaDiv.style.display = "none"; // Menyembunyikan div
        }
      }
    </script>
</body>
</html>
