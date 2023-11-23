@extends('admin.layouts.index')
@section('title', 'Room List')

@section('content')
<div class="container">
    <h2>Room Actions</h2>

    <div class="form-group">
        <a href="{{ route('addroompage') }}" class="btn btn-primary">Add Rooms</a>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
            <th>id</th>
          <th>Room Code</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($data as $room)
        <tr>
            <td>{{ $room->id }}</td>
            <td>{{ $room->roomcode }}</td>
            <td>
              <form action="{{ route('deleteroom', $room->id)}}" method="post">
                <a href="{{ route('editroompage', ['id'=>$room->id])}}" class="btn btn-primary btn-sm">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
              </td>
        </tr>
        @empty
        <p>no room inputed</p>
        @endforelse
        
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
@endsection