@extends('layouts.teacher')

@section('teacher-header')
Penilaian - Tambah penilaian
@endsection

@section('teacher-content')
    <section class="section">
        <form action="{{ route('teacher.assessment.update', $class->id) }}" method="POST" class="card">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                          <label for="kategori-column" class="form-label"
                            >Pilih Siswa</label
                          >
                            <fieldset class="form-group">
                                <select class="form-select" name="user_id" id="kategori-column" required>
                                    <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->nis ?? "-" }}</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="" class="label-form mb-2">Masukkan Nilai Siswa</label>
                            <input type="number" class="form-control" name="value" value="{{ old('value', $user->value) }}" min="0" required>
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary">Perbarui Penilaian</button>
                        <a href="{{ route('teacher.assessment.show', $class->id) }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <input type="hidden" name="teacher_subject_id" value="{{ $class->id }}">
                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="assessment_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}">
                </div>
            </div>
        </form>
    </section>
@endsection
