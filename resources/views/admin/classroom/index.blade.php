@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Kelas
@endsection

@section('admin-header')
Manajemen Kelas
@endsection

@section('admin-content')
    <section class="section">
        <form action="{{ route('admin.classroom.store') }}" method="POST" class="card">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label for="" class="form-label">Nama Kelas</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                          <label for="kategori-column" class="form-label"
                            >Jurusan</label
                          >
                            <fieldset class="form-group">
                                <select class="form-select" name="major_id" id="kategori-column">
                                    <option value="" disabled>Pilih Jurusan...</option>
                                    @foreach ($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-2 d-grid">
                        <button class="btn btn-primary">
                            Tambahkan Kelas
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Kelas
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Jurusan</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($class as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->major->name }}</td>
                            <td>
                                <a onclick="confirmDelete({{ $item->id }})" class="btn btn-danger">Hapus</a>
                                <a onclick="confirmDeleteUser({{ $item->id }})" class="btn btn-info">Hapus Kelas, Pengguna, Penilaian</a>
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
            title: 'Konfirmasi Hapus Kelas',
            text: 'Apakah Anda yakin ingin menghapus Kelas?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/classroom/delete/${blogId}`,
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

    function confirmDeleteUser(blogId) {
        Swal.fire({
            title: 'Konfirmasi Hapus Kelas dan User',
            text: 'Apakah Anda yakin ingin menghapus Kelas? Ini akan menghapus seluruh user yang bersangkutan dengan kelas ini dan juga penilaian dari guru',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/classroom/delete-user/${blogId}`,
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
