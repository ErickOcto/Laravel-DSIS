@extends('layouts.student')

@section('student-header')
Nilai siswa
@endsection

@section('student-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar nilai anda
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai</th>
                            <th>Tanggal Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $task->name }}</th>
                            <th>{{ $task->subject }}</th>
                            <th>{{ $task->value }}</th>
                            <th>{{ $task->assessment_date }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
