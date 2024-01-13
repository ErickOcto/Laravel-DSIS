@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Guru
@endsection

@section('admin-header')
Manajemen Guru
@endsection

@section('admin-content')
    <section class="section">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h3>{{ $teacher->name }}</h3>
                        </div>
                        <div class="my-3">
                            <label for="">email</label>
                            <div class="fw-bold fs-5">{{ $teacher->email }}</div>
                        </div>
                        <div class="my-3">
                            <label for="">Kejuruan</label>
                            <div class="fw-bold fs-5">{{ $teacher->Major->name }}</div>
                        </div>
                        <div class="my-3">
                            <label for="">Kelas</label>
                            <div class="fw-bold fs-5">{{ $teacher->Classroom->name ?? "Tidak memiliki kelas"}}</div>
                        </div>
                        <div class="mt-5 d-grid">
                            <a href="{{ route('admin.teacher.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <form action="{{ route('admin.teacher.addsub') }}" method="POST" class="card">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{ $teacher->id }}">
                            <div class="col-5">
                                <div class="form-group">
                                  <label for="kategori-column" class="form-label"
                                    >Kelas Guru</label
                                  >
                                    <fieldset class="form-group">
                                        <select class="form-select" name="classroom_id" id="kategori-column" required>
                                            <option value="" disabled>Pilih Kelas</option>
                                            @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                  <label for="kategori-column" class="form-label"
                                    >Mata Pelajaran Guru</label
                                  >
                                    <fieldset class="form-group">
                                        <select class="form-select" name="subject_id" id="kategori-column" required>
                                            <option value="" disabled>Pilih Mata Pelajaran</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="d-grid w-full">
                                    <button class="btn btn-primary">
                                        Tambahkan Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card">
                    <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas Yang Diajar</th>
                            <th>Mata Pelajaran</th>
                            <th class="min-w-100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->classroom_name ?? "Tidak Memiliki Kelas" }}</td>
                            <td>{{ $user->subject_name }}</td>
                            <td>
                                <a onclick="confirmDelete({{ $user->id }})" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('add-script')
<script>
    function confirmDelete(blogId) {
        Swal.fire({
            title: 'Konfirmasi Hapus Data',
            text: 'Apakah Anda yakin ingin menghapus data Mata Pelajaran dan Kelas Guru?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/teacher/delsub/${blogId}`,
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
