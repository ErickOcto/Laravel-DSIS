@extends('layouts.officer')

@section('officer-header')
Petugas - Book Category
@endsection

@section('officer-content')
    <section class="section">
        <div class="card">
            <form class="card-body" action="{{ route('officer.book-categories.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                          <label for="judul-column" class="form-label"
                            >Nama Kategori</label>
                            <div class="row">
                                <div class="col-9">
                                    <input
                                      type="text"
                                      id="judul-column"
                                      class="form-control"
                                      name="name"
                                      placeholder="Masukkan Nama Kategori"
                                      required
                                    />
                                    <input type="hidden" name="view" value="0">
                                </div>
                                <div class="col-3 d-grid">
                                    <button class="btn btn-primary">
                                        <i class="bi bi-plus-square"></i>
                                        Tambahkan Kategori
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-start align-items-center ">
                <h5 class="card-title">
                    Daftar Kategori Buku
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Jumlah Views</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->view }}</td>
                            <td>
                                <a onclick="confirmDelete({{ $category->id }})" class="btn btn-danger">Hapus</a>
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
            title: 'Konfirmasi Hapus Kategori',
            text: 'Apakah Anda yakin ingin menghapus Kategori Buku ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/officer/book-categories/delete/${kategoriId}`,
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (response) {
                        //location.reload();
                    }
                });
            }
        });
    }
</script>
@endpush
