@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Kategori
@endsection

@section('admin-header')
Manajemen Kategori - Edit - {{ $kategori->nama }}
@endsection

@section('admin-content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form class="card" action="{{ route('admin.category.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title">Form tambah Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Nama Kategori</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="nama"
                                    placeholder="Masukkan Judul"
                                    value="{{ old('nama', $kategori->nama) }}"
                                  />
                                </div>
                            </div>
                        </div>
                        <label for="summernote" class="form-label"
                            >Deskripsi</label
                          >
                        <textarea id="summernote" name="deskripsi">
                            {{ $kategori->deskripsi }}
                        </textarea>
                    </div>
                    <div class="card-footer">
                        <div class="w-full row gx-5 d-flex">
                            <div class="col-6 d-grid">
                                <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-6 d-grid">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
