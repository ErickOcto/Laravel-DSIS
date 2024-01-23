@extends('layouts.admin')

@section('admin-title')
Manajemen Bantuan - Edit {{ $help->name }}
@endsection

@section('admin-header')
Manajemen Bantuan - Edit {{ $help->name }}
@endsection

@section('admin-content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.help.update', $help->id) }}" method="POST" class="card">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="judul-column" class="form-label"
                            >Nama Bantuan</label
                          >
                          <input
                            type="text"
                            id="judul-column"
                            class="form-control"
                            name="name"
                            placeholder="Masukkan Nama Bantuan"
                            data-parsley-required="true"
                            required
                            value="{{ old('name', $help->name) }}"
                          />
                        </div>
                        <div class="form-group">
                          <label for="judul-column" class="form-label"
                            >Deskripsi Bantuan</label
                          >
                          <textarea
                            type="text"
                            id="judul-column"
                            class="form-control"
                            name="description"
                            placeholder="Masukkan Isi Bantuan"
                            data-parsley-required="true"
                            required
                            rows="10"
                            cols="10"
                          >{{ $help->description }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('admin.help.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
