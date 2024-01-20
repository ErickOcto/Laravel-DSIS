@extends('layouts.officer')

@section('officer-header')
Buat Acara - Voting
@endsection

@section('officer-content')
    <section class="section">
        {{-- <form id="myForm" action="{{ route('officer.polling.store') }}" class="card" method="POST" enctype="multipart/form-data"> --}}
        <form action="{{ route('officer.polling.store') }}" class="card" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                Form Tambah Acara Voting
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <h3>Detail Acara</h3>
                    <div class="col-6">
                        <div class="form-group">
                          <label for="judul-column" class="form-label"
                            >Nama Acara</label
                          >
                          <input required
                            type="text"
                            id="judul-column"
                            class="form-control"
                            name="event_name"
                            placeholder="Masukkan nama acara"
                            data-parsley-required="true"
                          />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label for="kategori-column" class="form-label"
                            >Kategori Acara</label
                          >
                            <fieldset class="form-group">
                                <select class="form-select" name="event_category" id="kategori-column" required>
                                    <option value="vote">Vote</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label for="judul-column" class="form-label"
                            >Tanggal Mulai Acara</label
                          >
                          <input required
                            type="date"
                            id="judul-column"
                            class="form-control"
                            name="event_start_date"
                            data-parsley-required="true"
                          />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label for="judul-column" class="form-label"
                            >Tanggal Selesai Acara</label
                          >
                          <input required
                            type="date"
                            id="judul-column"
                            class="form-control"
                            name="event_end_date"
                            data-parsley-required="true"
                          />
                        </div>
                    </div>
                </div>
                <div class="wrap row mt-5" id="optionsContainer">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>Detail Pilihan</h3>
                        <button type="button" class="btn btn-success" onclick="addOption()">Tambah Pilihan</button>
                    </div>
                    <!-- Formulir-->
                    <div class="option-form col-12 mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="judul-column" class="form-label">Nama Pilihan</label>
                                <input required type="text" class="form-control" name="candidate_name[]" placeholder="Masukkan nama pilihan" data-parsley-required="true"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="judul-column" class="form-label">Foto Pilihan</label>
                                <input required type="file" class="form-control" name="candidate_image[]" data-parsley-required="true"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="judul-column" class="form-label">Deskripsi Pilihan</label>
                                <textarea required class="form-control" name="candidate_vision[]" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="bungkus">
                    <a href="{{ route('officer.event.create') }}" class="btn btn-secondary">Kembali</a>
                    {{-- <button type="button" class="btn btn-primary" onclick="return confirmSubmission()">
                        Simpan Acara
                    </button> --}}
                    <button type="submit" class="btn btn-primary">
                        Simpan Acara
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection

@push('add-script')
  <script>
    // //fungsi swal
    // function confirmSubmission() {
    //   Swal.fire({
    //     title: 'Konfirmasi',
    //     text: 'Apakah Anda yakin ingin mengirim formulir?',
    //     icon: 'question',
    //     showCancelButton: true,
    //     confirmButtonText: 'Ya, Kirim!',
    //     cancelButtonText: 'Batal'
    //   }).then((result) => {
    //     if (result.isConfirmed) {
    //       submitForm();
    //     }
    //   });
    // }

    // //Fungsi submit
    // function submitForm() {
    //   var form = document.getElementById('myForm');
    //   var formData = new FormData(form);

    //   // Menambahkan token CSRF ke dalam FormData
    //   formData.append('_token', '{{ csrf_token() }}');

    //   // Kirim formulir menggunakan Ajax
    //   $.ajax({
    //     url: "{{ route('officer.polling.store') }}",
    //     type: "POST",
    //     data: formData,
    //     processData: false,
    //     contentType: false,
    //     dataType: 'json', // Menetapkan tipe data yang diharapkan
    //     success: function(response) {
    //       // Handle success response
    //       console.log(response);

    //       // Tambahkan logika lain jika diperlukan
    //       if (response.success) {
    //         Swal.fire({
    //           title: 'Sukses',
    //           text: 'Formulir berhasil disubmit!',
    //           icon: 'success'
    //         });
    //       }
    //     },
    //     error: function(xhr, status, error) {
    //       // Handle error response
    //       console.error(xhr.responseText);
    //       Swal.fire({
    //         title: 'Error',
    //         text: 'Terjadi kesalahan saat mengirim formulir.',
    //         icon: 'error'
    //       });
    //     }
    //   });
    // }

    // //fungsi clone formulir
    // document.getElementById('add').addEventListener('click', function () {
    //   var originalWrap = document.querySelector('.wrap');
    //   var newWrap = originalWrap.cloneNode(true);
    //   var inputs = newWrap.querySelectorAll('input, textarea');
    //   inputs.forEach(function (input) {
    //     input.value = '';
    //   });
    //   originalWrap.parentNode.appendChild(newWrap);
    // });

    function addOption() {
        // Clone formulir input dan tambahkan ke dalam kontainer
        var newOption = document.querySelector('.option-form').cloneNode(true);
        document.getElementById('optionsContainer').appendChild(newOption);
    }
  </script>
@endpush
