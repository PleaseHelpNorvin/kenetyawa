@extends('admin.layouts.index')
@section('title', 'Room List')

@section('content')
    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="row">
                <!-- FORM Panel -->
                
                <div class="col-md-4">
                    <form action="{{ route('addroompost') }}" method="POST" id="manage-room">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Room Form
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id">

                                <div class="mb-3">
                                    <label for="inputRoomCode" class="form-label">Room Code</label>
                                    <input type="text" name="room_code" class="form-control" id="inputRoomCode"
                                        placeholder="Enter Room Code">
                                    @if ($errors->has('room_code'))
                                        <span class="text-danger">{{ $errors->first('room_code') }}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <a href="" class="btn btn-secondary me-2"><i
                                                class="fa fa-window-close"></i> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- FORM Panel -->

                <!-- Table Panel -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <b>Room List</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Room Code</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $room)
                                        <tr>
                                            <td class="text-center">{{ $room->id }}</td>
                                            <td class="">{{ $room->roomcode }}</td>
                                            <td>
                                                <form action="{{ route('deleteroom', $room->id) }}" method="post">
                                                    <a href="{{ route('editroompage', ['id'=>$room->id]) }}"
                                                        class="btn btn-primary "><i class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger "><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>no room inputed</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table Panel -->
            </div>
        </div>

    </div>
    <style>

        td {
            vertical-align: middle !important;
        }

    </style>

@endsection
