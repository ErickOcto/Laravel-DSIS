@extends('layouts.latihan')

@section('latihan-title')
Daftar Guru SMKN6
@endsection

@section('latihan-content')
<section class="container my-100">
    <div class="title-2">
        Daftar Guru SMKN 6 Balikpapan
    </div>
    <table class="table mt-24
    ">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Kompetensi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($teachers as $key => $item)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->name }}</td>
          <td>{{ $item->major_name }}</td>
          <td><a href="{{ route('teachers.detail', $item->id) }}" class="btn btn-secondary">Lihat Detail</a></td>
        </tr>
        @empty
            No Data
        @endforelse
      </tbody>
    </table>
</section>
@endsection
