@extends('layouts.admin')

@section('admin-title')
Admin - Manajemen Galeri
@endsection

@section('admin-header')
Manajemen Galeri
@endsection

@section('admin-content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h5 class="card-title">
                    Daftar Bantuan QnA
                </h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($helps as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->description }}
                            </td>
                            <td>
                                <a href="{{ route('admin.help.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="confirmDelete({{ $item->id }})" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="{{ route('admin.help.post') }}" class="modal-content" method="POST">
          @csrf
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="judul-column" class="form-label"
                >Nama Bantuan</label
              >
              <input
                type="text"
                id="judul-column"
                class="form-control"
                name="name"
                placeholder="Masukkan Nama Bantuan"
                data-parsley-required="true"
                required
              />
            </div>
            <div class="form-group">
              <label for="judul-column" class="form-label"
                >Deskripsi Bantuan</label
              >
              <textarea
                type="text"
                id="judul-column"
                class="form-control"
                name="description"
                placeholder="Masukkan Isi Bantuan"
                data-parsley-required="true"
                required
                rows="10"
                cols="10"
              ></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan data</button>
          </div>
        </form>
      </div>
    </div>
@endsection

@push('add-script')
    <script>
        function confirmDelete(blogId) {
            Swal.fire({
                title: 'Konfirmasi Hapus Bantuan',
                text: 'Apakah Anda yakin ingin menghapus Bantuan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/help/delete/${blogId}`,
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
