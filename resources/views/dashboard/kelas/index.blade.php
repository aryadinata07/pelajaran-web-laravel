@extends('dashboard.app')

@section('content')
  <a href="/dashboard/kelas/create" class="btn btn-primary mb-3">ADD data</a>
  @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif

  @if(count($kelas) > 0)
    <h2>Existing Items</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Timestamp</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($kelas as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
            <a href="/dashboard/kelas/edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                <form method="post" action="/dashboard/kelas/destroy/{{ $item->id }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No items found.</p>
  @endif
@endsection
