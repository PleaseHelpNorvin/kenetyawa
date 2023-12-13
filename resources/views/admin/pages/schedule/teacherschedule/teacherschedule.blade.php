@extends('admin.layouts.index')
@section('title', 'Teacher Schedule ')
@section('content')

    <style>
        .navbar {
            margin-bottom: 20px;
        }

        .nav-content {
            display: none;
        }
    </style>

    <div class="container mt-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('scheduleviewnav') }}"
                            class="nav-link {{ request()->routeIs('scheduleviewnav*') ? 'active' : '' }}">Event |</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacherscheduleview', ['teacherID' => 'null']) }}"
                            class="nav-link {{ request()->routeIs('teacherscheduleview*') ? 'active' : '' }}">Teacher
                            Schedule |</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('studentscheduleview', ['BatchId' => 'null', 'BlockId' => 'null']) }}"
                            class="nav-link {{ request()->routeIs('studentscheduleview') ? 'active' : '' }}">Student
                            Schedule </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- <div class="form-group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if ($activeTeacher)
                    {{ $activeTeacher->name }}
                @else
                    Select Teacher
                @endif
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($selectTeacher as $teacher)
                    <a class="dropdown-item select-teacher"
                        href="{{ route('teacherscheduleview', ['teacherID' => $teacher->id_no]) }}">{{ $teacher->name }}</a>
                @endforeach
            </div>
            <a href="{{ route('addteacherschedule') }}" class="btn btn-primary">Add Teacher Schedule</a>
        </div> --}}

        @if ($activeTeacher)
            <div class="form-group">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $activeTeacher->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($selectTeacher as $teacher)
                        <a class="dropdown-item select-teacher"
                            href="{{ route('teacherscheduleview', ['teacherID' => $teacher->id_no]) }}">{{ $teacher->name }}</a>
                    @endforeach
                </div>
                <a href="{{ route('addteacherschedule') }}" class="btn btn-primary">Add Teacher Schedule</a>
            </div>
        @else
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Select Teacher
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($selectTeacher as $teacher)
                    <a class="dropdown-item select-teacher"
                        href="{{ route('teacherscheduleview', ['teacherID' => $teacher->id_no]) }}">{{ $teacher->name }}</a>
                @endforeach
            </div>
        @endif

        @if ($teacherSchedules)
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                            <li class="nav-item" style="margin-right: 130px;">
                                <a class="nav-link" href="#{{ strtolower($day) }}"
                                    onclick="showContent(this, '{{ strtolower($day) }}')">{{ $day }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>

            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                <div id="{{ strtolower($day) }}-content" class="nav-content">
                @php
    $sortedSchedules = $teacherSchedules->where('day', $day)->sortBy(function ($sched) {
        return $sched->time_from ? strtotime($sched->time_from) : PHP_INT_MAX;
    });
@endphp
                    <table class="table table-striped teacherschedule" data-block="" data-batch="">
                        <thead>
                            <tr>
                            <th>Time</th>
                                <th>Subject</th>
                                <th>Room</th>
                                <th>Day</th>
                             
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($sortedSchedules as $sched)
                                @if ($sched->day == $day)
                                    <tr>
                                    <td class="table-primary">
                                            @if ($sched->time_from && $sched->time_to)
                                                {{ date('h:i A', strtotime($sched->time_from)) }} -
                                                {{ date('h:i A', strtotime($sched->time_to)) }}
                                            @else
                                                Time not available
                                            @endif
                                        </td>
                                        <td>{{ $sched->subjectname }}</td>
                                        <td>{{ $sched->roomcode }}</td>
                                        <td>{{ $sched->day }}</td>
                                       
                                        <td>{{ $sched->year }}</td>
                                        <td>{{ $sched->semester }}</td>
                                        <td>
                                            <form action="{{ route('deletesteacherchedule', $sched->id) }}" method="POST">
                                                <a href="{{ route('vieweditteachersched', ['id' => $sched->id, 'teacherID' => $sched->faculty_list_id]) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a> @csrf
                                                @method('DELETE')
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
         document.addEventListener("DOMContentLoaded", function() {
        // Show content for Monday by default
        showContent(document.querySelector('.nav-link.active1'), 'monday');
    });
        function showContent(element, day) {
            var allContent = document.getElementsByClassName('nav-content');
            for (var i = 0; i < allContent.length; i++) {
                allContent[i].style.display = 'none';
            }
            var selectedContent = document.getElementById(day + '-content');
            if (selectedContent) {
                selectedContent.style.display = 'block';
            }

            // Reset background color for all navigation items and set text color to white
            var allItems = document.querySelectorAll('.nav-item');
            allItems.forEach(function(item) {
                item.style.backgroundColor = '';
                item.style.color = '#ffffff'; // Set text color to white
            });

            // Set background color for the clicked navigation item
            element.parentNode.style.backgroundColor = '#007bff';
            element.parentNode.classList.add('rounded');
        }
    </script>

    <style>
        .navbar-nav .nav-item .nav-link.active {
            color: blue;
        }
    </style>

@endsection
