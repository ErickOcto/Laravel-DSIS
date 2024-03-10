@extends('layouts.officer')

@section('officer-header')
Petugas - Manajemen Peminjaman
@endsection

@section('officer-content')
    <section class="section">
        <div class="card">
            <form action="{{ route('officer.borrow.userSearch') }}" method="GET" class="card-body">

                <div class="form-group">
                  <label for="judul-column" class="form-label"
                    >NIS atau Email Siswa</label
                  >
                  <div class="row">
                    <div class="col-5">
                        <input
                          type="text"
                          id="judul-column"
                          class="form-control"
                          name="query"
                          placeholder="Masukkan NIS atau Email Siswa"
                          data-parsley-required="true"
                          value="{{ old('nis', $query) }}"
                        />
                    </div>
                    <div class="col-5">
                        <input
                          type="text"
                          id="judul-column"
                          class="form-control"
                          name="book"
                          placeholder="Masukkan Kode Buku"
                          data-parsley-required="true"
                          value="{{ old('book_code', $bookQuery) }}"
                        />
                    </div>
                    <div class="col-2 d-grid">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                  </div>
                </div>
            </form>
        </div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @if(!$users)
                <h1 class="text-center">Tidak Ditemukan Data Pengguna</h1>
                @else
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-4">
                            <div class="col-4 offset-lg-4">
                                @if($users->image)
                                <img src="/storage/users/{{ $users->image }}" class="avatar img-fluid" alt="">
                                @else
                                <img src="/users/user_pp_default.jpeg" class="avatar img-fluid" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-6">
                                <label for="">Nama siswa</label>
                                <input type="text" class="form-control" disabled value="{{ $users->name ?? "Tidak ditemukan siswa" }}">
                            </div>
                            <div class="col-6">
                                <label for="">Email siswa</label>
                                <input type="text" class="form-control" disabled value="{{ $users->email }}">
                            </div>
                            <div class="col-6">
                                <label for="">NIS siswa</label>
                                <input type="text" class="form-control" disabled value="{{ $users->nis }}">
                            </div>
                            <div class="col-6">
                                <label for="">Kelas siswa</label>
                                <input type="text" class="form-control" disabled value="{{ $users->Classroom->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                    @if($books)
                    <div class="col-12">
                        <div class="row mb-4">
                            <div class="col-4 offset-lg-4">
                                @if($books->image || $books != null)
                                <img class="img-fluid" src="/storage/books/{{ $books->image }}"></img>
                                @else
                                <div class="img-fluid" style="background: url('/users/no-image.jpeg'); background-size:cover; min-height:350px"></div>
                                @endif
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-6">
                                <label for="">Judul buku</label>
                                <input type="text" class="form-control" disabled value="{{ $books->title ?? "Tidak ditemukan judul" }}">
                            </div>
                            <div class="col-6">
                                <label for="">Pengarang buku</label>
                                <input type="text" class="form-control" disabled value="{{ $books->author ?? "Tidak ditemukan pengarang"}}">
                            </div>
                            <div class="col-6">
                                <label for="">Kode buku</label>
                                <input type="text" class="form-control" disabled value="{{ $books->book_code ?? "Tidak ditemukan kode buku" }}">
                            </div>
                            <div class="col-6">
                                <label for="">Tahun buku</label>
                                <input type="text" class="form-control" disabled value="{{ $books->year ?? "Tidak ditemukan tahun" }}">
                            </div>
                            <div class="col-6">
                                <label for="">Stock buku</label>
                                <input type="text" class="form-control" disabled value="{{ $books->stock ?? "Tidak ditemukan stock"}}">
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <h1>Tidak Ditemukan Data Buku</h1>
                        </div>
                    </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($users && $books)
<form action="{{ route('officer.borrow.store') }}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ $users->id }}">
    <input type="hidden" name="book_id" value="{{ $books->id }}">
<div class="d-flex align-items-center justify-content-end">
<a href="{{ route('officer.borrow.index') }}" class="btn btn-secondary me-2">Kembali</a>
<button type=" submit" class="btn btn-primary">Konfirmasi Peminjaman</button>
</div>
</form>
@endif

    </section>
@endsection
