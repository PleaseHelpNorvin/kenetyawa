@extends('admin.layouts.teacherlayout')
@section('title', 'Log in Teacher Schedule')

@section('content')
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item  ml-5">
                    <a href="{{ route('teacherinfo',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Schedule</a>
                </li>
                <li class="nav-item  ml-5">
                    <a href="{{ route('scheduleviewnav2',['teacher_Id' => $teacher->id_no]) }}" class="nav-link font-weight-bold text-black">Event </a>
                </li>
                <li class="nav-item  ml-5">
                    <a href="" class="nav-link font-weight-bold text-black">Report </a>
                </li>
            </ul>
        </div>
    </nav>
    @if ($teacherLoginInfo)
        <h1>{{ $teacher->name }}'s Schedule</h1>
        <div class="form-group">
            <br>
            <form class="d-flex" method="get">
                <label for="search_teacherSchedDay" class="mr-2">Select Day:</label>
                <select class="form-control mr-3" name="search_teacherSchedDay" id="search_teacherSchedDay">
                    <option value="Monday" {{ Request('search_teacherSchedDay') === 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ Request('search_teacherSchedDay') === 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ Request('search_teacherSchedDay') === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ Request('search_teacherSchedDay') === 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ Request('search_teacherSchedDay') === 'Friday' ? 'selected' : '' }}>Friday</option>
                    <!-- Add other days as needed -->
                </select>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Day</th>
                        <th>Time From</th>
                        <th>Time To</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Room ID</th>
                        <th>Subject ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teacherLoginInfo as $schedule)
                    <tr>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ date('h:i A', strtotime($schedule->time_from)) }}</td>
                        <td>{{ date('h:i A', strtotime($schedule->time_to)) }}</td>
                        <td>{{ $schedule->year }}</td>
                        <td>{{ $schedule->semester }}</td>
                        <td>{{ $schedule->room_id }}</td>
                        <td>{{ $schedule->subject_id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    @endif
    </div>
@endsection
