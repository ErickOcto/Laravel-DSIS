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
                <a class="btn btn-primary" href="{{ route('admin.majors.create') }}">Buat jurusan</a>
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
                            @if(strlen($major->name) > 40)
                            <td>{{ Str::substr($major->name, 0, 40)}}...</td>
                            @else
                            <td>{{ $major->name }}</td>
                            @endif
                            <td><img src="{{ asset('/storage/majors/'.$major->photo) }}" class="rounded" style="width: 150px"></td>
                            <td>{{ \Carbon\Carbon::parse($major->created_at)->format('H:i d F Y') }}</td>
                            <td>{{ $major->User->name ?? "Admin Sebelumnya"}}</td>
                            <td>
                                <a href="{{ route('admin.majors.edit', $major->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="confirmDelete({{ $major->id }})" class="btn btn-danger">Hapus</a>
                                @if($major->status === 0)
                                    <form action="/admin/update-majors-status/{{ $major->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="1">
                                        <button class="btn btn-info" type="submit">Tampilkan</button>
                                    </form>
                                @else
                                    <form action="/admin/update-majors-status/{{ $major->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="0">
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

@push('add-script')
<script>
    function confirmDelete(kategoriId) {
        Swal.fire({
            title: 'Konfirmasi Hapus Jurusan',
            text: 'Apakah Anda yakin ingin menghapus Jurusan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/majors/delete/${kategoriId}`,
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
