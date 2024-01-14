@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Petugas
@endsection

@section('admin-header')
Manajemen Petugas
@endsection

@section('admin-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Petugas
                </h5>
                <a class="btn btn-primary" href="{{ route('admin.officer.create') }}">Tambahkan Petugas</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Ditambahkan</th>
                            <th class="min-w-100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            @if ($user->image)
                                <td><img src="{{ asset('/storage/users/'.$user->image) }}" class="" style="width: 50px; border-radius:50%"></td>
                                @else
                                <td><img src="{{ asset('/users/user_pp_default.jpeg') }}" class="" style="width: 50px; border-radius:50%"></td>
                            @endif
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('H:i d F Y') }}</td>
                            <td>
                                <a href="{{ route('admin.officer.edit', $user->id) }}" class="btn btn-warning">Edit</a>
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
            title: 'Konfirmasi Hapus Petugas',
            text: 'Apakah Anda yakin ingin menghapus Petugas?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/officer/delete/${blogId}`,
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
