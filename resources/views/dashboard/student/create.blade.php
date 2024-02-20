@extends('dashboard.app')

@section('content')
<form method="post" action="/dashboard/student/add">
    @csrf
    <div class="mb-3">
      <label for="nis" class="form-label">NIS</label>
      <input type="number" class="form-control" id="nis" name="nis">
    </div>
    <div class="mb-3">
      <label for="studentName" class="form-label">Nama Siswa</label>
      <input type="text" class="form-control" id="nama" name="nama"  value="{{old('nama')}}">
    </div>
    <div class="mb-3">
    <select class="form-select" name="kelas" id="kelas">
            @foreach($grade as $class)
            <option name="kelas" value="{{$class->nama}}">{{$class ->nama}}</option>
            @endforeach
    </select>
    </div>
    <div class="mb-3">
      <label for="taggalLahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"  value="{{old('tanggal_lahir')}}">
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat"  value="{{old('alamat')}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection