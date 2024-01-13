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
                        />
                    </div>
                    <div class="col-2 d-grid">
                        <button class="btn btn-primary" type="submit">Cari User</button>
                    </div>
                  </div>
                </div>
            </form>
        </div>
    </section>
@endsection
