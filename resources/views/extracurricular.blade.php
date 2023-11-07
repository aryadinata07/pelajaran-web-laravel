@extends('layout.main')
@section('content')
    <h1>Ini adalah halaman Ekstra</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="table-dark">
                <th scope="col">Nama</th>
                <th scope="col">nama pembina</th>
                <th scope="col">deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($extracurricular as $extracurricular)
                <tr>
                    <th scope="row">{{ $extracurricular['nama'] }}</th>
                    <td>{{ $extracurricular['pembina'] }}</td>
                    <td>{{ $extracurricular['deskripsi'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
