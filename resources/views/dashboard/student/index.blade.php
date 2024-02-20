@extends('dashboard.app')

@section('content')

<form class="form-inline mb-4 d-flex gap-4">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

@if (auth()->check())
<a href="/dashboard/student/create" class="btn btn-primary mb-3">ADD data</a>
@endif

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr class="table-dark">
            <th>NIS</th>
            <th>NAMA</th>
            <th>KELAS</th>
            <th>ALAMAT</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <th>{{ $student['nis'] }}</th>
            <td>{{ $student['nama'] }}</td>
            <td>{{ $student['kelas'] }}</td>
            <td>{{ $student['alamat'] }}</td>
            <td class="text-center">
                <a href="/dashboard/student/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
                @if (auth()->check())
                <a href="/dashboard/student/edit/{{ $student->id }}" class="btn btn-warning">Edit</a>
                <form action="/dashboard/student/delete/{{ $student->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
