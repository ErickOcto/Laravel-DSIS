@extends('layouts.teacher')

@section('teacher-header')
Guru - Penilaian
@endsection

@section('teacher-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Kelas Yang Diajar
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($class as $item)
                        <tr>
                            <td style="min-width: 10%">{{ $loop->iteration }}</td>
                            <td style="min-width: 200px">{{ $item->classroom_name }}</td>
                            <td style="min-width: 200px">{{ $item->subject_name }}</td>
                            <td style="min-width: 200px">
                                <a href="{{ route('teacher.assessment.show', $item->id) }}" class="btn btn-info">Lihat Detail Penilaian Kelas</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
