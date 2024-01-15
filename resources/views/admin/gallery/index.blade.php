@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Galeri
@endsection

@section('admin-header')
Manajemen Galeri
@endsection

@section('admin-content')
    <section class="section">
        <form action="{{ route('admin.gallery.store') }}" method="POST" class="card" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="image" class="form-control" required>
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
                    Daftar Gambar
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('/storage/gallery/' . $item->image) }}" alt="{{ $item->image }}" style="width: 148px" class="rounded">
                            </td>
                            <td>
                                @if($item->status === 0)
                                    <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="1">
                                        <button class="btn btn-info" type="submit">Tampilkan</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="0">
                                        <button class="btn btn-light" type="submit">Sembunyikan</button>
                                    </form>
                                @endif
                                <a onclick="confirmDelete({{ $item->id }})" class="btn btn-danger">Hapus</a>
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
                    url: `/admin/gallery/delete/${blogId}`,
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
