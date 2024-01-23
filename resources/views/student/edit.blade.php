@extends('layout.main')

@section('content')
  <h1>Edit Student</h1>

  <form method="POST" action="/student/update/{{ $student->id }}">
    @csrf
    @method('PUT')
    <div class="form">
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" value="{{ $student->nis }}" >
        </div>
        <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $student->nama }}" >
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Date of Birth</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $student->tanggal_lahir }}" >
        </div>
        <div class="form-group">
            <label for="kelas">Class</label>
            <input type="text" class="form-control" name="kelas" id="kelas" value="{{ $student->kelas }}" >
        </div>
         <div class="form-group">
            <label for="kelas">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $student->alamat }}" >
        </div>
        <div class="text-center"> 
            <button type="submit" class="btn btn-primary btn-lg">Edit</button>
        </div>
    </div>
  </form>
@endsection