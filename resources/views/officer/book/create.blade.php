@extends('layouts.officer')

@section('officer-header')
Manajemen Buku - Tambah Data
@endsection

@section('officer-content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form class="card" action="{{ route('officer.books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Form tambah Buku</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Judul Buku</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="title"
                                    placeholder="Masukkan Judul Buku"
                                    data-parsley-required="true"
                                  />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="kategori-column" class="form-label"
                                    >Kategori Buku</label
                                  >
                                    <fieldset class="form-group">
                                        <select class="form-select" name="book_category_id" id="kategori-column" required>
                                            <option value="" disabled>Pilih Kategori Buku</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Kode Buku</label
                                  >
                                  <input
                                    type="number"
                                    id="judul-column"
                                    class="form-control"
                                    name="book_code"
                                    placeholder="Masukkan Kode Buku"
                                    data-parsley-required="true"
                                  />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Pengarang</label
                                  >
                                  <input
                                    type="text"
                                    id="judul-column"
                                    class="form-control"
                                    name="author"
                                    placeholder="Masukkan Nama Pengarang"
                                    data-parsley-required="true"
                                  />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Stock Buku</label
                                  >
                                  <input
                                    type="number"
                                    id="judul-column"
                                    class="form-control"
                                    name="stock"
                                    placeholder="Masukkan Stock Buku"
                                    min="1"
                                    data-parsley-required="true"
                                  />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                  <label for="judul-column" class="form-label"
                                    >Tahun Buku</label
                                  >
                                  <input
                                    type="date"
                                    id="judul-column"
                                    class="form-control"
                                    name="year"
                                    placeholder="Masukkan Judul Buku"
                                    data-parsley-required="true"
                                  />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                    <input type="file" class="form-control" name="image" accept=".png, .jpg" id="inputGroupFile01" required>
                                </div>
                                <div class="input-group mb-3">

                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="w-full row gx-5 d-flex">
                            <div class="col-6 d-grid">
                                <a href="{{ route('officer.books.index') }}" class="btn btn-secondary">Kembali</a>
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
