@extends('layouts.admin')

@section('admin-header')

@endsection

@section('admin-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Blog 
                </h5>
                <a class="btn btn-primary" href="{{ route('admin.blog.create') }}">Buat blog</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Photo Utama</th>
                            <th>Kategori</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Kreator</th>
                            <th>Jumlah Views</th>
                            <th class="min-w-100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            @if(strlen($blog->judul) > 40)
                            <td>{{ Str::substr($blog->judul, 0, 40)}}...</td>
                            @else
                            <td>{{ $blog->judul }}</td>
                            @endif
                            <td><img src="{{ asset('/storage/blogs/'.$blog->photo) }}" class="rounded" style="width: 150px"></td>
                            <td>{{ $blog->Category->nama ?? "Tidak memiliki Kategori" }}</td>
                            <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('H:i d F Y') }}</td>
                            <td>{{ $blog->User->name }}</td>
                            <td>{{ $blog->lihat }}</td>
                            <td>
                                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="confirmDelete({{ $blog->id }})" class="btn btn-danger">Hapus</a>
                                @if($blog->carousel === 0)
                                    <form action="/admin/blog/update/carousel/{{ $blog->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="carousel" value="1">
                                        <button class="btn btn-info" type="submit">Tampilkan</button>
                                    </form>
                                @else
                                    <form action="/admin/blog/update/carousel/{{ $blog->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="carousel" value="0">
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
    function confirmDelete(blogId) {
        Swal.fire({
            title: 'Konfirmasi Hapus Blog',
            text: 'Apakah Anda yakin ingin menghapus Blog?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/blog/delete/${blogId}`,
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
