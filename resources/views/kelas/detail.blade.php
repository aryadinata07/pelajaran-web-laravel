@extends('layout.main')

@section('content')
  <h1>{{ $title }}</h1>

  <div>
    <p>ID: {{ $kelas->id }}</p>
    <p>Nama: {{ $kelas->nama }}</p>
    <p>Timestamp: {{ $kelas->created_at }}</p>
  </div>

  <a href="/kelas" class="btn btn-primary">Back to Kelas List</a>
@endsection