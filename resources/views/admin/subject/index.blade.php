@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Mata Pelajaran
@endsection

@section('admin-header')
Manajemen Mata Pelajaran
@endsection

@section('admin-content')
    <section class="section">
        <form action="{{ route('admin.subject.store') }}" method="POST" class="card">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <label for="" class="label-form mb-3">Nama Mata Pelajaran</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama mata pelajaran" required>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <button class="btn btn-primary">Tambahkan data mata pelajaran</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Guru
                </h5>
                <a class="btn btn-primary" href="{{ route('admin.teacher.create') }}">Tambahkan Guru</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Tanggal Ditambahkan</th>
                            <th class="min-w-100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($subject->created_at)->format('H:i d F Y') }}</td>
                            <td>
                                <a onclick="confirmDelete({{ $subject->id }})" class="btn btn-danger">Hapus</a>
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
    function confirmDelete(blogId) {
        Swal.fire({
            title: 'Konfirmasi Hapus Mata Pelajaran',
            text: 'Apakah Anda yakin ingin menghapus Mata Pelajaran ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/subject/delete/${blogId}`,
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
