@extends('admin.layouts.index')
@section('title', 'Student Schedule ')

@section('content')
    <style>
        /* Your existing styles */
        .navbar {
            margin-bottom: 20px;
        }

        .nav-content {
            display: none;
        }
    </style>
    {{-- <script>
    $(document).ready(function() {
        $('.select-teacher').click(function() {
            // Get the teacher ID from the href attribute
            var teacherID = $(this).attr('href').split('=')[1];
            var selectedTeacher = $(this).text();
    
            // Update the button text with the selected teacher's name
            $('.btn.btn-primary.dropdown-toggle').text(selectedTeacher);
        });
    });
    </script> --}}


    <div class="container mt-3">

        <!-- Navigation Links -->
        <!-- Navigation Links -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('scheduleview', ['teacherID' => 'null']) }}"
                            class="nav-link {{ request()->routeIs('scheduleview*') ? 'active' : '' }}">Teacher Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('studentscheduleview') }}"
                            class="nav-link {{ request()->routeIs('studentscheduleview') ? 'active' : '' }}">Student
                            Schedule</a>
                    </li>
                </ul>
            </div>
        </nav>


        <!-- Dropdown for Selecting Teacher -->
        <div class="form-group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{-- select teacher  --}}
                @if ($activeTeacher)
                    {{ $activeTeacher->name }}
                @else
                    Select Teacher
                @endif

            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($selectTeacher as $teacher)
                    <a class="dropdown-item select-teacher"
                        href="{{ route('scheduleview', ['teacherID' => $teacher->id_no]) }}">{{ $teacher->name }}</a>
                @endforeach
            </div>

            <!-- Button to Add Teacher Schedule -->
            <a href="{{ route('addteacherschedule') }}" class="btn btn-primary">Add Teacher Schedule</a>
        </div>

        <!-- Navbar for Days of the Week -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#sunday" onclick="showContent('sunday')">Sunday</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#monday" onclick="showContent('monday')">Monday</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tuesday" onclick="showContent('tuesday')">Tuesday</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wednesday" onclick="showContent('wednesday')">Wednesday</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#thursday" onclick="showContent('thursday')">Thursday</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#friday" onclick="showContent('friday')">Friday</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#saturday" onclick="showContent('saturday')">Saturday</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content for Each Day -->


        <!-- Sunday -->
        <div id="sunday-content" class="nav-content">
            <!-- Your table and content for Sunday -->
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
                        @if ($sched->day == 'Sunday')
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
                        <!-- <p>No schedule inputted</p>  -->
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- MONDAY -->
        <div id="monday-content" class="nav-content">
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
                        @if ($sched->day == 'Monday')
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
                        <!-- <p>No schedule inputted</p> -->
                    @endforelse

                </tbody>
            </table>
        </div>




        <!-- tuesday -->
        <div id="tuesday-content" class="nav-content">
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
                        @if ($sched->day == 'Tuesday')
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




        <!-- wednesday -->
        <div id="wednesday-content" class="nav-content">
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
                        @if ($sched->day == 'Wednesday')
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


        <!-- thursday -->
        <div id="thursday-content" class="nav-content">
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
                        @if ($sched->day == 'Thursday')
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
        <!-- friday -->
        <div id="friday-content" class="nav-content">
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
                        @if ($sched->day == 'Friday')
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
        <!-- saturday -->
        <div id="saturday-content" class="nav-content">
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
                        @if ($sched->day == 'Saturday')
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

        <script>
            function showContent(day) {
                // Hide all content sections
                var allContent = document.getElementsByClassName('nav-content');
                for (var i = 0; i < allContent.length; i++) {
                    allContent[i].style.display = 'none';
                }

                // Show the selected content section
                var selectedContent = document.getElementById(day + '-content');
                if (selectedContent) {
                    selectedContent.style.display = 'block';
                }
            }
        </script>
    </div>
    <style>
        /* CSS */
        .navbar-nav .nav-item .nav-link.active {
            color: blue;
            /* Set the text color to black for the active link */
            /* Additional styles for the active state */
        }
    </style>

@endsection
