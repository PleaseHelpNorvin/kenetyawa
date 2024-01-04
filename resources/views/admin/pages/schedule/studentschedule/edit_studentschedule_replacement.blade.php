@extends('admin.layouts.index')
@section('title', 'EditSchedule ')
@section('content')

<div class="container mt-0">
    <h1>Edit Schedule</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('updateScheduleReplacement', ['BatchId' => $findBatch->id, 'BlockId' => $findBlock->id,'scheduleId' => $schedule->id,'scheduleName' => $schedule->student_name]) }}" method="post">
    @csrf
    @method('patch')
        <input type="hidden" name="batch_id" value="{{ $findBatch->id }}">
        <input type="hidden" name="block_id" value="{{ $findBlock->id }}">

        <div class="form-group">
            <label for="teacher_name">Teacher Name:</label>

            <select class="form-control" id="teacher_name" name="teacher_name">
                <option value="{{ $schedule->teacher_name }}" >{{ $schedule->teacher_name }}</option>
                @foreach ($selectTeacher as $teacher)
                @if($teacher->name != $schedule->teacher_name)
                    <option value="{{ $teacher->name }}">
                        {{ $teacher->name }}</option>
                        @endif
                @endforeach
            </select>
            @error('teacher_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="form-group">
            <label for="subject_name">Subject Name:</label>
    
            <select class="form-control" id="subject_name" name="subject_name">
                <option value="{{ $schedule->subject_name}}" >{{ $schedule->subject_name}}</option>
                @foreach ($selectSubject as $Subject)
                @if($Subject->subjectname != $schedule->subject_name)
                    <option value="{{ $Subject->subjectname}}">
                        {{ $Subject->subjectname }}</option>
                    @endif
                @endforeach
            </select>
            @error('subject_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="room_code">Room Code:</label>
            
            <select class="form-control" id="room_code" name="room_code">
                <option value="{{ $schedule->room_code }}" >{{ $schedule->room_code }}</option>
                @foreach ($selectRoom as $room)
                @if($room->roomcode != $schedule->room_code)
                    <option value="{{ $room->roomcode}}">
                        {{ $room->roomcode }}</option>
                    @endif
                @endforeach
            </select>
            @error('room_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

      <div class="form-group">
    <label for="day">Day:</label>
    <select class="form-control" id="day" name="day">
        <option value="Monday" {{ $schedule->day === 'Monday' ? 'selected' : '' }}>Monday</option>
        <option value="Tuesday" {{ $schedule->day === 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
        <option value="Wednesday" {{ $schedule->day === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
        <option value="Thursday" {{ $schedule->day === 'Thursday' ? 'selected' : '' }}>Thursday</option>
        <option value="Friday" {{ $schedule->day === 'Friday' ? 'selected' : '' }}>Friday</option>
        <option value="Saturday" {{ $schedule->day === 'Saturday' ? 'selected' : '' }}>Saturday</option>
        <!-- Repeat for other days -->
    </select>
    @error('day')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="Regular" {{ $schedule->status === 'Regular' ? 'selected' : '' }}>Regular</option>
                <option value="Replacement" {{ $schedule->status === 'Replacement' ? 'selected' : '' }}>Replacement</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="time_in">Time from:</label>
            <input type="time" class="form-control" id="time_in" name="time_in" value="{{ $schedule->time_in }}">
            @error('time_in')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="time_out">Time to:</label>
            <input type="time" class="form-control" id="time_out" name="time_out" value="{{ $schedule->time_out }}">
            @error('time_out')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add other fields as needed -->

        <button type="submit" class="btn btn-primary">Update Schedule</button>
    </form>
</div>

@endsection
