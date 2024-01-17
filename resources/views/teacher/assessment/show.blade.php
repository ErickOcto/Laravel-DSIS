@extends('layouts.teacher')

@section('teacher-header')
Guru - Penilaian
@endsection

@section('teacher-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Kelas {{ $class->classroom_name }} > Mapel {{ $class->subject_name }}
                </h5>
                <div class="wrap">
                    <a href="{{ route('teacher.assessment.index', $class->id) }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('teacher.create.assessment', $class->id) }}" class="btn btn-primary">Buat Penilaian</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NIS Siswa</th>
                            <th>Nilai</th>
                            <th>Tanggal penilaian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td style="min-width: 10%">{{ $loop->iteration }}</td>
                            <td style="min-width: 200px">{{ $user->name }}</td>
                            <td style="min-width: 200px">{{ $user->nis }}</td>
                            <td style="min-width: 200px">{{ $user->value }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->date)->format('d F Y') }}</td>
                            <td>
                                <a href="{{ route('teacher.assessment.edit', $class->id) }}" class="btn btn-warning">Edit Penilaian</a>
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
    function confirmDelete(kategoriId) {
        Swal.fire({
            title: 'Konfirmasi Hapus Penilaian',
            text: 'Apakah Anda yakin ingin menghapus penilaian siswa ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/teacher/assessment/delete/${kategoriId}`,
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
