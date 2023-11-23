@extends('admin.layouts.index')
@section('title', 'Edit Room List')

@section('content')
    <div class="container">
        <h1>Edit Room</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('addroompost') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="inputRoomCode" class="form-label">Room Code</label>
                        <input type="text" name="room_code" class="form-control" id="inputRoomCode" placeholder="Enter Room Code" value="{{$room->roomcode}}">
                    </div>

                    <div class="text-end">
                        <a href="{{ route('showroom') }}" class="btn btn-secondary me-2">Close</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection