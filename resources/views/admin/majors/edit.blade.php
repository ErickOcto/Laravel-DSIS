@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Jurusan
@endsection

@section('admin-header')
Manajemen Jurusan - Edit - {{ $major->name }}
@endsection

@section('admin-content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form class="card" action="{{ route('admin.majors.update', $major->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title">Form edit Jurusan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Nama Jurusan</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name', $major->name) }}"
                                    placeholder="Masukkan Nama Jurusan"
                                    data-parsley-required="true"
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
                        </div>
                        <label for="summernote" class="form-label"
                            >Deskripsi Jurusan</label
                          >
                        <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi Jurusan">
                            {{ $major->description }}
                        </textarea>
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
