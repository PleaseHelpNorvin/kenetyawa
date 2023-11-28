@extends('admin.layouts.index')
@section('title', 'AddSchedule ')
@section('content')

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>{{ $findBatch->batch_name  }} - {{ $findBlock->block_name  }}</h1>
        <form action="{{ route('addScheduleSave', ['BatchId' => $findBatch->id, 'BlockId' => $findBlock->id]) }}" method="post">
            @csrf
            <input type="hidden" name = "batch_id" value = "{{ $findBatch->id }}">
            <input type="hidden" name = "block_id"  value = "{{ $findBlock->id }}">
            
            <div class="form-group">
                        <label for="teacher_name">Teacher Name:</label>
                        <select class="form-control" id="teacher_name" name="teacher_name" >
                            <option value="">Select Teacher</option>
                            @foreach ($selectTeacher as $teacher)
                                <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subject_name">Subject Name:</label>
                        <select class="form-control" id="subject_name" name="subject_name" >
                            <option value="">Select Subject</option>
                            @foreach ($selectSubject as $Subject)
                                <option value="{{ $Subject->subjectname }}">{{ $Subject->subjectname }}</option>
                            @endforeach
                        </select>
                    </div>
          
                    <div class="form-group">
                        <label for="room_code">Room Code:</label>
                        <select class="form-control" id="room_code" name="room_code" >
                            <option value="">Select Room</option>
                            @foreach ($selectRoom as $room)
                                <option value="{{ $room->roomcode }}">{{ $room->roomcode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day">Day:</label>
                        <select class="form-control" id="day" name="day" >
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <!-- Add more options if needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time_in">Time from:</label>
                        <input type="time" class="form-control" id="time_in" name="time_in" >
                        <label for="time_out">Time to:</label>
                        <input type="time" class="form-control" id="time_out" name="time_out" >
                    </div>

          
     
          
            <!-- Add other fields based on your schedule model -->

            <button type="submit" class="btn btn-primary">Add Schedule</button>
        </form>
    </div>


@endsection
