@extends('layouts.student')

@section('student-header')
Buku yang dipinjam
@endsection

@section('student-content')
<section class="section">
    <div class="row">
        @foreach ($books as $book)
            <div class="col-3">
                <div class="card">
                    <img src="{{ asset('/storage/books/' . $book->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-title">
                            Judul : {{ $book->title }}
                        </div>
                        <div class="card-text">
                            Penulis : {{ $book->author }} <br>
                            Kode Buku : {{ $book->book_code }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
