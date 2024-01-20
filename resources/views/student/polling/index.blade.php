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
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $event->name }}</th>
                            <th>{{ $event->category }}</th>
                            <th>{{ $event->event_start }}</th>
                            <th>{{ $event->event_end }}</th>
                            @if($event->category == 'vote')
                            
                            <td>
                                <a href="{{ route('student.vote', $event->id) }}" class="btn btn-primary">Vote Sekarang</a>
                            </td>
                            @endif
                            <th>

                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
