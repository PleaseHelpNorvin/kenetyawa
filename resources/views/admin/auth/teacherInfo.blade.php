@extends('admin.layouts.teacherlayout')
@section('title', 'Log in Teacher Schedule')

@section('content')
<div class="container">
<div class="topnav">
    <a class="logo" href=""> <i class="fa fa-calendar"></i> SCHEDULING SYSTEM</a>
    <div class="profile-dropdown">
        <div id="profile-content" class="profile-content">
          
            <a href="{{ route('showLandingPage')}}">Log Out</a>
        </div>
    </div>
</div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ml-5">
                    <a href="{{ route('teacherinfo',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Schedule</a>
                </li>
                <li class="nav-item ml-5">
                    <a href="{{ route('scheduleviewnav2',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Event </a>
                </li>
                <li class="nav-item ml-5">
                    <a href="{{ route('reports.viewteacher',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Report </a>
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

                <label for="search_teacherSchedYear" class="mr-2">Select Year:</label>
                <select class="form-control mr-3" name="search_teacherSchedYear" id="search_teacherSchedYear">
                    <!-- Add your list of years dynamically here -->
                    <option value="2022" {{ Request('search_teacherSchedYear') === '2022' ? 'selected' : '' }}>2022</option>
                    <option value="2023" {{ Request('search_teacherSchedYear') === '2023' ? 'selected' : '' }}>2023</option>
                    <!-- Add more years as needed -->
                </select>
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
                <tbody id="scheduleBody">
                    @foreach ($teacherLoginInfo as $schedule)
                        <tr class="schedule-row" data-day="{{ $schedule->day }}" data-year="{{ $schedule->year }}">
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

<script>
    document.getElementById('search_teacherSchedDay').addEventListener('change', function() {
        filterSchedule();
    });

    document.getElementById('search_teacherSchedYear').addEventListener('change', function() {
        filterSchedule();
    });

    function filterSchedule() {
        var selectedDay = document.getElementById('search_teacherSchedDay').value;
        var selectedYear = document.getElementById('search_teacherSchedYear').value;

        var rows = document.getElementsByClassName('schedule-row');
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var day = row.getAttribute('data-day');
            var year = row.getAttribute('data-year');

            if ((day === selectedDay || selectedDay === 'All') && (year === selectedYear || selectedYear === 'All')) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }
</script>

@endsection
