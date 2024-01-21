@extends('layouts.officer')

@section('officer-header')
Petugas - Manajemen Acara
@endsection

@section('officer-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Acara
                </h5>
                <a href="{{ route('officer.event.create') }}" class="btn btn-primary">
                    Buat Acara
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Acara</th>
                            <th>Kategori Acara</th>
                            <th>Mulai Acara</th>
                            <th>Akhir Acara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->category }}</td>
                            <td>{{ $event->event_start }}</td>
                            <td>{{ $event->event_end }}</td>
                            <td>
                                <a href="{{ route('officer.event.detail', $event->id) }}" class="btn btn-info">Detail</a>
                                <a onclick="confirmDelete({{ $event->id }})" class="btn btn-danger">Hapus</a>
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
            title: 'Konfirmasi Hapus Acara',
            text: 'Apakah Anda yakin ingin menghapus Acara ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/officer/polling/delete/${kategoriId}`,
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
