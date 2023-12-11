@extends('admin.layouts.loginlayouts')
@section('title', 'Log in Teacher Schedule')

@section('content')
    @if ($teacherLoginInfo)
        <h1>{{ $teacher->name }}'s Schedule</h1>
        <div class="form-group">
            <br>
            <form class="form-inline my-2 my-lg-0" method="get"
                >
                <input class="form-control mr-sm-3" value="{{Request('search_teacherSchedDay')}}" name="search_teacherSchedDay" type="search"
                    placeholder="Enter Day" >
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
@endsection
