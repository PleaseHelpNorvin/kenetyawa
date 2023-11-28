@extends('admin.layouts.index')
@section('title', 'Schedule ')
@section('content')

<style>
    .navbar { margin-bottom: 20px; }
    .nav-content { display: none; }
</style>

<div class="container mt-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('scheduleview', ['teacherID' => 'null']) }}" class="nav-link {{ request()->routeIs('scheduleview*') ? 'active' : '' }}">Teacher Schedule</a></li>
                <li class="nav-item">
                  <a href="{{ route('studentscheduleview', ['BatchId' => 'null' ,'BlockId' => 'null']) }}"
                      class="nav-link {{ request()->routeIs('studentscheduleview') ? 'active' : '' }}">Student Schedule</a>
              </li>
            </ul>
        </div>
    </nav>

    <div class="form-group">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if ($activeTeacher) {{ $activeTeacher->name }} @else Select Teacher @endif
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($selectTeacher as $teacher)
                <a class="dropdown-item select-teacher" href="{{ route('scheduleview', ['teacherID' => $teacher->id_no]) }}">{{ $teacher->name }}</a>
            @endforeach
        </div>
        <a href="{{ route('addteacherschedule') }}" class="btn btn-primary">Add Teacher Schedule</a>
    </div>

    
@if($teacherSchedules)
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                    <li class="nav-item" style="margin-right: 80px;">
                        <a class="nav-link" href="#{{ strtolower($day) }}" onclick="showContent(this, '{{ strtolower($day) }}')">{{ $day }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>

    @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
        <div id="{{ strtolower($day) }}-content" class="nav-content">
            <table class="table table-striped teacherschedule" data-block="" data-batch="">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Room</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teacherSchedules as $sched)
                        @if ($sched->day == $day)
                            <tr>
                                <td>{{ $sched->subjectname }}</td>
                                <td>{{ $sched->roomcode }}</td>
                                <td>{{ $sched->day }}</td>
                                <td>
                                    @if ($sched->time_from && $sched->time_to)
                                        {{ date('h:i A', strtotime($sched->time_from)) }} -
                                        {{ date('h:i A', strtotime($sched->time_to)) }}
                                    @else
                                        Time not available
                                    @endif
                                </td>
                                <td>{{ $sched->year }}</td>
                                <td>{{ $sched->semester }}</td>
                                <td>
                                    <form action="{{ route('deletesteacherchedule', $sched->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @empty
                        {{-- <p>No schedule inputted</p> --}}
                    @endforelse
                </tbody>
            </table>
        </div>
    @endforeach
@endif
</div>

<script>
    function showContent(element, day) {
        var allContent = document.getElementsByClassName('nav-content');
        for (var i = 0; i < allContent.length; i++) {
            allContent[i].style.display = 'none';
        }
        var selectedContent = document.getElementById(day + '-content');
        if (selectedContent) {
            selectedContent.style.display = 'block';
        }

        // Reset background color for all navigation items
        var allItems = document.querySelectorAll('.nav-item');
        allItems.forEach(function (item) {
            item.style.backgroundColor = '';
        });

        // Set background color for the clicked navigation item
        element.parentNode.style.backgroundColor = '#007bff';
        element.parentNode.classList.add('rounded');
    }
</script>

<style>
    .navbar-nav .nav-item .nav-link.active { color: blue; }
</style>

@endsection
