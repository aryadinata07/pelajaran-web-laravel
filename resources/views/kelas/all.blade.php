@extends('layout.main')

@section('content')
  <h1>{{ $title }}</h1>

  @if(count($kelas) > 0)
    <h2>Existing Items</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Timestamp</th>
        </tr>
      </thead>
      <tbody>
        @foreach($kelas as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->created_at }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No items found.</p>
  @endif
@endsection