@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Petugas
@endsection
@section('admin-header')
Manajemen Petugas - Edit Petugas
@endsection

@section('admin-content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form class="card" action="{{ route('admin.officer.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title">Form tambah Petugas</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gy-5">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Nama Petugas</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="name"
                                    placeholder="Masukkan Nama Petugas"
                                    data-parsley-required="true"
                                    value="{{ old('name', $user->name) }}"
                                  />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                    <input type="file" class="form-control" name="photo" accept=".png, .jpg" id="inputGroupFile01">
                                </div>
                                <div class="input-group mb-3">

                                 </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Email Petugas</label
                                  >
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="input-group mb-3">
                                 </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Password Petugas</label
                                  >
                                    <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin merngubah password">
                                </div>
                                <div class="input-group mb-3">
                                 </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="w-full row gx-5 d-flex">
                            <div class="col-6 d-grid">
                                <a href="{{ route('admin.officer.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-6 d-grid">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
