@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Guru
@endsection
@section('admin-header')
Manajemen Guru - Edit Data - {{ $user->name }}
@endsection

@section('admin-content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form class="card" action="{{ route('admin.teacher.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title">Form edit Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gy-5">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Nama Guru</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="name"
                                    placeholder="Masukkan Nama Guru"
                                    data-parsley-required="true"
                                    value="{{ old('name', $user->name) }}"
                                  />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="kategori-column" class="form-label"
                                    >Jurusan Guru</label
                                  >
                                    <fieldset class="form-group">
                                        <select class="form-select" name="major_id" id="kategori-column" required>
                                            <option value="" disabled>Pilih Jurusan</option>
                                            @foreach ($majors as $major)
                                            <option value="{{ $major->id }}" {{ $major->id == $user->major_id ? 'selected' : '' }}>{{ $major->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Email Guru</label
                                  >
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="input-group mb-3">
                                 </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Password Guru</label
                                  >
                                    <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                                </div>
                                <div class="input-group mb-3">
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
                            <div class="col-12">
                            <label for="summernote" class="form-label"
                            >Konten</label
                          >
                        <textarea name="bio" class="form-control" placeholder="Masukkan Deskripsi Guru, Seperti Pengalaman, Skill, dll.">{{ $user->bio }}</textarea>
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
