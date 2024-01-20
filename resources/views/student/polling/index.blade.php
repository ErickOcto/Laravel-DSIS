@extends('layouts.student')

@section('student-header')
Acara Yang Berlangsung
@endsection

@section('student-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar acara
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Acara</th>
                            <th>Kategori</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
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
                            @if($event->event_end == $date)
                            <td>
                                <button class="btn btn-danger" disabled>Acara Telah Berakhir</button>
                            </td>
                            @else
                            <td>
                                <a href="{{ route('student.vote', $event->id) }}" class="btn btn-primary">Vote Sekarang</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
