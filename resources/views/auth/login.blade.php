<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- Bootstrap --}}
    <link
      href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css') }}"
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


<section class="container" style="display:flex; align-items:center; justify-content:center; height:100vh;">
    <div class="">
        <div class="navbar-brand text-center mb-48">
            SMKN 6 Balikpapan
        </div>
        <form action="{{ route('login') }}" class="card" method="POST" style="min-width: 418px">
            @csrf
            <div class="m-24">
                <div class="title-3-blue mb-8">
                    Masuk ke akun anda
                </div>
                <p class="subtitle-2 mb-24" style="color: #000">
                    Silahkan input data dibawah
                </p>
                <div class="mb-24">
                  <label for="formInputEmail" class="form-label title-5">Email</label>
                  <input type="email" class="form-control" id="formInputEmail" name="email" placeholder="Input email">
                </div>
                <div class="mb-24">
                  <label for="formInputPassword" class="form-label title-5">Password</label>
                  <input type="password" class="form-control" id="formInputPassword" name="password" placeholder="Input password">
                </div>
                <div class="subtitle-2 mb-24" style="color: #000;
                font-size: 16px;
                font-style: normal;
                font-weight: 400;
                line-height: 100%; /* 16px */">
                    Belum punya akun? <a href="/register" style="
                    color: #000;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: 100%;
                    text-decoration-line: underline;
                    ">Daftar Sekarang</a>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="
                    color: #000;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: 100%;
                    text-decoration-line: underline;
                    ">Lupa password?</a>
                    @endif
                    <button class="btn btn-primary ml-24">
                        Masuk Ke Akun
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
</body>
</html>
