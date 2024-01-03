@extends('layouts.admin')

@section('admin-title')
Admin - Kategori Blog
@endsection

@section('admin-header')
Kategori Blog
@endsection

@section('admin-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Kategori
                </h5>
                <a class="btn btn-primary" href="{{ route('admin.category.create') }}">Buat Kategori</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Kreator</th>
                            <th>Jumlah Views</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->nama }}</td>
                            @if(strlen($kategori->deskripsi > 30))
                            <td>{{ Str::substr($kategori->deskripsi, 0, 30) }}...</td>
                            @else
                            <td>{{ Str::strip_tags($kategori->deskripsi) }}</td>
                            @endif

                            <td>{{ $kategori->created_at }}</td>
                            <td>{{ $kategori->User->name }}</td>
                            <td>{{ $kategori->lihat }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="confirmDelete({{ $kategori->id }})" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection

@push('add-script')
<script>
    function confirmDelete(kategoriId) {
        Swal.fire({
            title: 'Konfirmasi Hapus Kategori',
            text: 'Apakah Anda yakin ingin menghapus Kategori?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/category/delete/${kategoriId}`,
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>
@endpush
