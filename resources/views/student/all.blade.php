@extends('layout.main')

@section('content')
    <h1>Ini adalah halaman student</h1>

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
                    <a href="/student/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
