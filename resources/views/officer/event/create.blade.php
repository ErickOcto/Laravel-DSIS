@extends('layouts.officer')

@section('officer-header')
Manajemen Acara - Buat Acara
@endsection

@section('officer-content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('officer.polling.create') }}" class="card bg-primary" style="min-height: 200px">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h1 class="fs-1 text-center">
                                        <i class="bi bi-clipboard-check-fill me-3"></i>
                                        Voting
                                    </h1>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="card bg-secondary" style="min-height: 200px">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h1 class="fs-1 text-center">
                                        Fitur Belum Tersedia
                                    </h1>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="container">
                    <a href="{{ route('officer.event.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </div>
    </section>
@endsection
