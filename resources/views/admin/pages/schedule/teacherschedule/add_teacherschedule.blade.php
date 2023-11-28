@extends('admin.layouts.index')
@section('title', 'Add Teacher Schedule')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Add Teacher Schedule</h2>
            </div>
            <div class="card-body">
                {{-- ['teacherID' => $selectTeacherId->id] --}}
                <form action="{{ route('addteacherschedulepost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="teacher_name">Teacher Name:</label>
                        <select class="form-control" id="teacher_name" name="teacher_name" >
                            <option value="">Select Teacher</option>
                            @foreach ($selectTeacher as $teacher)
                                <option value="{{ $teacher->id_no }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <select class="form-control" id="subject" name="subject" >
                            <option value="">Select Subject</option>
                            @foreach ($selectSubject as $subject)
                                <option value="{{ $subject->subjectcode }}">{{ $subject->subjectcode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room">Room:</label>
                        <select class="form-control" id="room" name="room" >
                            <option value="">Select Room</option>
                            @foreach ($selectRoom as $room)
                                <option value="{{ $room->roomcode }}">{{ $room->roomcode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day">Day:</label>
                        <select class="form-control" id="day" name="day" >
                            <option value=""><--Select Day--></option>
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
                        <label for="year">year:</label>
                        <input type="text" class="form-control" name="year">
                    </div>
                    <div class="form-group">
                        <label for="year">semester:</label>
                        <input type="text" class="form-control" name="semester">
                    </div>
                    <div class="form-group">
                        <label for="time_from">Time from:</label>
                        <input type="time" class="form-control" id="time_from" name="time_from" >
                        <label for="time_to">Time to:</label>
                        <input type="time" class="form-control" id="time_to" name="time_to" >
                    </div>


            </div>
            <div class="card-footer">
                <!-- Footer content if needed -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Schedule</button>
                    <a href="{{ route('scheduleview', ['teacherID' => $teacher->id_no]) }}" type="button" class="btn btn-danger">Close</a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
