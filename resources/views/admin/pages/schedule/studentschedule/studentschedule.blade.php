@extends('admin.layouts.index')
@section('title', 'Student Schedule')

@section('content')
    <style>
        /* Your existing styles */
        .navbar {
            margin-bottom: 20px;
        }

        .nav-content {
            display: none;
        }

        .navbar-nav .nav-item .nav-link.active {
            color: blue;
        }

        .nav-link.active1 {
            color: blue;
        }
    </style>

    <div class="container mt-3">
        <!-- Navigation Links -->
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

        <!-- Dropdowns for selecting batch and block -->
        <div class="form-group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Select Batch
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($getBatch as $Batch)
                    <a class="dropdown-item select-teacher"
                        href="{{ route('studentscheduleview', ['BatchId' => $Batch->id, 'BlockId' => 'null']) }}">{{ $Batch->batch_name }}</a>
                @endforeach
            </div>
        </div>

        @if ($getBlock)
            <div class="form-group">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Block
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($getBlock as $block)
                        <a class="dropdown-item select-teacher"
                            href="{{ route('studentscheduleview', ['BatchId' => $findBatch->id, 'BlockId' => $block->id]) }}">
                            {{ $block->block_name }}
                        </a>
                    @endforeach
                </div>

        @endif

        @if ($selectStudentSchedule)
        
    

            <!-- Search bar -->
            <div class="form-group">
                <br>


                <form class="form-inline my-2 my-lg-0" method="get"
                    action="{{ route('studentscheduleview', ['BatchId' => $findBatch->id, 'BlockId' => $findBlock->id]) }}">
                    <input class="form-control mr-sm-3" name="search_studentSchedule" type="search"
                        placeholder="Enter student name">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <br>
                <a href="{{ route('studentreplacement', ['BatchId' => $findBatch->id, 'BlockId' => $findBlock->id , 'studentID' => 'null'] ) }}"
                class="btn btn-success">Schedule for Replacement</a>
                
            <a href="{{ route('addStudentSchedule', ['BatchId' => $findBatch->id, 'BlockId' => $findBlock->id]) }}"
                class="btn btn-primary">Add Student Schedule</a>
            </div>

            <!-- Day navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                            <li class="nav-item {{ strtolower($day) === 'monday' ? 'active' : '' }}"
                                style="margin-right: 130px;">
                                <a class="nav-link" href="#{{ strtolower($day) }}"
                                    onclick="showContent(this, '{{ strtolower($day) }}')">{{ $day }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Student schedule for each day -->
            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                <div id="{{ strtolower($day) }}-content" class="nav-content">




                    @php
                        $sortedSchedules = $selectStudentSchedule->where('day', $day)->sortBy(function ($schedule) {
                            return $schedule->time_in ? strtotime($schedule->time_in) : PHP_INT_MAX;
                        });
                    @endphp
               
                    <table class="table table-bordered teacherschedule" data-block="" data-batch="">
                        <thead>
                            <tr>
                                <th>Time</th>
                               
                                <th>Block</th>
                                <th>Batch</th>
                                <th>Room</th>
                                <th>Subject</th>
                                <th>Teacher</th>

                                <th>Day</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sortedSchedules as $sched)
                                @if ($sched->day == $day)

                                @if($sched->status == 'Regular')
            <tr>
                <td class = "table-primary">
                                    @if ($sched->time_in && $sched->time_out)
    {{ date('h:i A', strtotime($sched->time_in)) }} -
                                        {{ date('h:i A', strtotime($sched->time_out)) }}
@else
    Time not available
    @endif
                                </td>
                               
                                <td class="table-success">{{ $findBatch->batch_name }}</td>
                                <td class="table-success">{{ $findBlock->block_name }}</td>
                                <td class="table-success">{{ $sched->room_code }}</td>
                                <td class="table-success">{{ $sched->subject_name }}</td>
                                <td class="table-success">{{ $sched->teacher_name }}</td>
                                <td class="table-success">{{ $sched->day }}</td>
                                <td class="table-success">{{ $sched->status }}</td>
                                <td  class="d-flex align-items-center" > {{-- Use flexbox for vertical alignment --}}
                                    
                                <form action="{{ route('edit.student.schedule', ['id' => $sched->id, 'BatchId' => $findBatch->id, 'BlockId' => $block->id]) }}" method="GET" class="mr-2">
                    @csrf
                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                </form>

                                    <form action="{{ route('delete.student.schedule', ['id' => $sched->id]) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this schedule?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
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
