@extends('layouts.officer')

@section('officer-header')
Petugas - Manajemen Peminjaman
@endsection

@section('officer-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Peminjaman
                </h5>
                <a href="{{ route('officer.borrow.create') }}" class="btn btn-primary">Tambah Data Peminajaman</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Judul Buku</th>
                            <th>Kode Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->name }}</td>
                            <td>{{ $borrow->nis }}</td>
                            <td>{{ $borrow->title }}</td>
                            <td>{{ $borrow->book_code }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d F Y') }}</td>
                            @if($borrow->return_date)
                            <td>{{ \Carbon\Carbon::parse($borrow->return_date)->format('d F Y') }}</td>
                            @else
                            <td>{{ $borrow->return_date ?? "Belum dikembalikan"}}</td>
                            @endif
                            <td>
                                @if($borrow->return_date)
                                <a href="#" class="btn btn-info disabled">Sudah Dikembalikan</a>
                                @else
                                <a onclick="confirmUpdate({{ $borrow->id }})" class="btn btn-info">Kembalikan Buku</a>
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

@push('add-script')
<script>
    function confirmUpdate(kategoriId) {
        Swal.fire({
            title: 'Konfirmasi Pengembalian Buku',
            text: 'Apakah Anda yakin ingin mengembalikan Buku ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Kembalikan!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/officer/borrow/return/${kategoriId}`,
                    type: "PUT",
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
