@extends('admin.layouts.index')
@section('title', 'Edit Teacher Schedule')
@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Edit Teacher Schedule</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('updateteacherschedpost', ['id'=>$teacherSchedule->id])}}" method="POST">
                @csrf
                {{-- @method('PATCH') --}}

                <div class="form-group">
                    <label for="teacher_name">Teacher Name:</label>
                    <select class="form-control" id="teacher_name" name="teacher_name" >
                        <option value="">Select Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id_no }}" @if($teacherSchedule->faculty_list_id == $teacher->id_no) selected @endif >
                                {{ $teacher->name }}</option>
                        @endforeach
                    </select>
                    @error('teacher_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">    
                    <label for="subject">Subject:</label>
                    <select class="form-control" id="subject" name="subject" >
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            @if($teacherSchedule->subject_id == $subject->subjectcode)
                                <option value="{{ $subject->subjectcode }}" selected>{{ $subject->subjectname }}</option>
                            @else
                                <option value="{{ $subject->subjectcode }}">{{ $subject->subjectname }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('subject')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="room">Room:</label>
                    <select class="form-control" id="room" name="room" >
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->roomcode }}" @if($teacherSchedule->room_id == $room->roomcode) selected @endif>{{ $room->roomcode }}</option>
                        @endforeach
                    </select>
                    @error('room')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="day">Day:</label>
                    <select class="form-control" id="day" name="day" >
                        <option value="">Select Day</option>
                        @foreach ($days as $day)
                            <option value="{{ $day }}" @if($teacherSchedule->day == $day) selected @endif>{{ $day }}</option>
                        @endforeach
                    </select>
                    @error('day')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="text" class="form-control" name="year" value="{{ $teacherSchedule->year }}" >
                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <input type="text" class="form-control" name="semester" value="{{ $teacherSchedule->semester }}" >
                    @error('semester')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="time_from">Time from:</label>
                    <input type="time" class="form-control" id="time_from" name="time_from" value="{{ $teacherSchedule->time_from }}" >
                    @error('time_from')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="time_to">Time to:</label>
                    <input type="time" class="form-control" id="time_to" name="time_to" value="{{ $teacherSchedule->time_to }}" >
                    @error('time_to')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Schedule</button>
                    <a href="{{ route('scheduleview',['id' => $teacherSchedule->id, 'teacherID' => $teacherSchedule->faculty_list_id]) }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection