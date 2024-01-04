@extends('layouts.admin')

@section('admin-header')

@endsection

@section('admin-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Jurusan
                </h5>
                <a class="btn btn-primary" href="{{ route('admin.blog.create') }}">Buat jurusan</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Logo Utama</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Kreator</th>
                            <th class="min-w-100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($majors as $major)
                        <tr>
                            @if(strlen($major->judul) > 40)
                            <td>{{ Str::substr($major->judul, 0, 40)}}...</td>
                            @else
                            <td>{{ $major->judul }}</td>
                            @endif
                            <td><img src="{{ asset('/storage/blogs/'.$major->photo) }}" class="rounded" style="width: 150px"></td>
                            <td>{{ $major->Category->nama ?? "Tidak memiliki Kategori" }}</td>
                            <td>{{ \Carbon\Carbon::parse($major->created_at)->format('H:i d F Y') }}</td>
                            <td>{{ $major->User->name }}</td>
                            <td>{{ $major->lihat }}</td>
                            <td>
                                <a href="{{ route('admin.blog.edit', $major->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="confirmDelete({{ $major->id }})" class="btn btn-danger">Hapus</a>
                                @if($major->carousel === 0)
                                    <form action="/admin/blog/update/carousel/{{ $major->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="carousel" value="1">
                                        <button class="btn btn-info" type="submit">Tampilkan</button>
                                    </form>
                                @else
                                    <form action="/admin/blog/update/carousel/{{ $major->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="carousel" value="0">
                                        <button class="btn btn-light" type="submit">Sembunyikan</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
