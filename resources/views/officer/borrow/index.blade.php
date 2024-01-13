@extends('layouts.officer')

@section('officer-header')
Petugas - Manajemen Peminjaman
@endsection

@section('officer-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Kategori Buku
                </h5>
                <a href="{{ route('officer.borrow.create') }}" class="btn btn-primary">Tambah Data Peminajaman</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Kode Buku</th>
                            <th>Stok</th>
                            <th>Tahun Buku</th>
                            <th>Jumlah Dipinjam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrows as $borrow)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $borrow->title }}</td>
                            <td>{{ $borrow->BookCategory->name ?? "Tidak Memiliki Kategori" }}</td>
                            <td>{{ $borrow->author ?? "Tidak Memiliki Penulis" }}</td>
                            <td>{{ $borrow->book_code }}</td>
                            <td>{{ $borrow->stock }}</td>
                            <td>{{ $borrow->year }}</td>
                            <td>{{ $borrow->view }}</td>
                            <td>
                                <a href="{{ route('officer.borrow.edit', $borrow->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="confirmDelete({{ $borrow->id }})" class="btn btn-danger">Hapus</a>
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
            text: 'Apakah Anda yakin ingin menghapus Kategori Buku ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/officer/books/delete/${kategoriId}`,
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
