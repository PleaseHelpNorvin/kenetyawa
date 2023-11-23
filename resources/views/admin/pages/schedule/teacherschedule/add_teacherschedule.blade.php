@extends('admin.layouts.index')
@section('title', 'Add Teacher Schedule')

@section('content')
    <div class="container mt-4">
        <h2>Add Teacher Schedule</h2>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <select class="form-control" id="teacher_name" name="teacher_name" required>
                    @foreach ($selectTeacher as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                {{-- <input type="text" class="form-control" id="subject" name="subject" required> --}}
                <select class="form-control" id="subject" name="subject" required>
                    @foreach($selectSubject as $subject)
                        <option value="{{$subject->id}}">{{$subject->subjectcode}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="room">Room:</label>
                <input type="text" class="form-control" id="room" name="room" required>
                <select class="form-control" id="room" name="room" required>
                    @foreach($selectRoom as $room)    
                        <option value="{{$room->id}}">{{$room->room}}</option>
                    @endforeach
            </div>
            <div class="form-group">
                <label for="day">Day:</label>
                <select class="form-control" id="day" name="day" required>
                    <option value="">Select Day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <!-- Add more options if needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="time_from">Time from:</label>
                <input type="time" class="form-control" id="time_from" name="time_from" required>
                <label for="time_to">Time to:</label>
                <input type="time" class="form-control" id="time_to" name="time_to" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Schedule</button>
        </form>
    </div>
@endsection
