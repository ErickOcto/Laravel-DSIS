@extends('layouts.latihan')

@section('latihan-title')
Jurusan
@endsection

@section('latihan-content')
{{ $major->name }}
@endsection
