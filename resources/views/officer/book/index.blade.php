@extends('layouts.officer')

@section('officer-header')
Petugas - Manajemen Buku
@endsection

@section('officer-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Kategori Buku
                </h5>
                <a href="{{ route('officer.books.create') }}" class="btn btn-primary">Tambahkan Buku</a>
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
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->BookCategory->name ?? "Tidak Memiliki Kategori" }}</td>
                            <td>{{ $book->author ?? "Tidak Memiliki Penulis" }}</td>
                            <td>{{ $book->book_code }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->view }}</td>
                            <td>
                                <a onclick="confirmDelete({{ $book->id }})" class="btn btn-danger">Hapus</a>
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
