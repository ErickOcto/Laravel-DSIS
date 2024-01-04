@extends('layouts.admin')

@section('admin-title')
Admin Manajemen Pengguna
@endsection

@section('admin-header')
Manajemen Pengguna
@endsection
@section('admin-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar User
                </h5>
                <a class="btn btn-primary" href="{{ route('admin.user.create') }}">Buat user</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Photo User</th>
                            <th>Tanggal Ditambahkan</th>
                            <th class="min-w-100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td><img src="{{ asset('/storage/blogs/'.$user->photo) }}" class="rounded" style="width: 150px"></td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('H:i d F Y') }}</td>
                            <td>
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="confirmDelete({{ $user->id }})" class="btn btn-danger">Hapus</a>
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
            title: 'Konfirmasi Hapus Blog',
            text: 'Apakah Anda yakin ingin menghapus Blog?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/blog/delete/${blogId}`,
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
