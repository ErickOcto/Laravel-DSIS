@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen blog
@endsection

@section('admin-header')
Manajemen Blog - Edit - {{ $blog->judul }}
@endsection

@section('admin-content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form class="card" action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="card-title">Form ubah Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Judul</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="judul"
                                    placeholder="Masukkan Judul"
                                    data-parsley-required="true"
                                    value="{{ old('judul', $blog->judul) }}"
                                  />
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                  <label for="kategori-column" class="form-label"
                                    >Kategori</label
                                  >
                                    <fieldset class="form-group">
                                        <select class="form-select" name="kategori_id" id="kategori-column">
                                            <option value="" disabled>Pilih Kategori...</option>
                                            @foreach ($categories as $kategori)
                                            <option value="{{ $kategori->id }}" {{ $kategori->id == $blog->category_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                    <input type="file" class="form-control" name="photo" accept=".png, .jpg" id="inputGroupFile01">
                                </div>
                                <div class="input-group mb-3">

                                 </div>
                            </div>
                        </div>
                        <label for="summernote" class="form-label"
                            >Konten</label
                          >
                        <textarea name="konten" id="summernote">
                            {{ $blog->konten }}
                        </textarea>
                    </div>
                    <div class="card-footer">
                        <div class="w-full row gx-5 d-flex">
                            <div class="col-6 d-grid">
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Kembali</a>
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
