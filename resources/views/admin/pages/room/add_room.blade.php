@extends('admin.layouts.index')
@section('title', 'Add Room List')

@section('content')
    <div class="container">
        <h1>Add Room</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('addroompost') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="inputRoomCode" class="form-label">Room Code</label>
                        <input type="text" name="room_code" class="form-control" id="inputRoomCode" placeholder="Enter Room Code">
                        @if ($errors->has('room_code'))
                            <span class="text-danger">{{ $errors->first('room_code') }}</span>
                        @endif
                    </div>

                    <div class="text-end">
                        <a href="{{ route('showroom') }}" class="btn btn-secondary me-2"><i class="fa fa-window-close"></i></a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection