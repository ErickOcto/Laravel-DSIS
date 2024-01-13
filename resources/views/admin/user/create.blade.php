@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Siswa
@endsection
@section('admin-header')
Manajemen Siswa - Buat Siswa
@endsection

@section('admin-content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form class="card" action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Form tambah Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gy-5">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Nama Siswa</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="name"
                                    placeholder="Masukkan Nama Siswa"
                                    data-parsley-required="true"
                                  />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="kategori-column" class="form-label"
                                    >Kelas Siswa</label
                                  >
                                    <fieldset class="form-group">
                                        <select class="form-select" name="classroom_id" id="kategori-column" required>
                                            <option value="" disabled>Pilih Kelas</option>
                                            @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >NIS Siswa</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="nis"
                                    placeholder="Masukkan NIS Siswa"
                                    data-parsley-required="true"
                                  />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                    <input type="file" class="form-control" name="photo" accept=".png, .jpg" id="inputGroupFile01" required>
                                </div>
                                <div class="input-group mb-3">

                                 </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Email Siswa</label
                                  >
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="input-group mb-3">
                                 </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Password Siswa</label
                                  >
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="input-group mb-3">
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="w-full row gx-5 d-flex">
                            <div class="col-6 d-grid">
                                <a href="{{ route('admin.majors.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-6 d-grid">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
