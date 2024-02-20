@extends('layout.main')

@section('content')
    @auth
        <h1>Selamat datang, {{ Auth::user()->name }}</h1>
    @else
        <h1>Ini adalah halaman home</h1>
    @endauth
@endsection
