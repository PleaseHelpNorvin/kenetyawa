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
</style>

<div class="container mt-3">
    <!-- Navigation Links -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
        <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('scheduleviewnav')}}"
                            class="nav-link {{ request()->routeIs('scheduleviewnav*') ? 'active' : '' }}">Event |</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacherscheduleview', ['teacherID' => 'null']) }}" 
                            class="nav-link {{ request()->routeIs('teacherscheduleview*') ? 'active' : '' }}">Teacher Schedule |</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('studentscheduleview', ['BatchId' => 'null' ,'BlockId' => 'null']) }}"
                            class="nav-link {{ request()->routeIs('studentscheduleview') ? 'active' : '' }}">Student Schedule </a>
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
            @foreach ($getBtach as $Batch)
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
                        href="{{ route('studentscheduleview', ['BatchId' => $findBatch->id, 'BlockId' => $block->id]) }}">{{ $block->block_name }}</a>
                @endforeach
            </div>
        </div>
    @endif

    @if($selectStudentSchedule)
        <a href="{{ route('addStudentSchedule', ['BatchId' => $findBatch->id, 'BlockId' => $block->id]) }}"
            class="btn btn-primary">Add Student Schedule</a>

        <!-- Day navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                        <li class="nav-item" style="margin-right: 80px;">
                            <a class="nav-link" href="#{{ strtolower($day) }}"
                                onclick="showContent(this, '{{ strtolower($day) }}')">{{ $day }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>

        <!-- Student schedule for each day -->
        @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
            <div id="{{ strtolower($day) }}-content" class="nav-content">
                <table class="table table-striped teacherschedule" data-block="" data-batch="">
                    <thead>
                        <tr>
                            <th>Block</th>
                            <th>Batch</th>
                            <th>Room</th>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Time</th>
                            <th>Day</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($selectStudentSchedule as $sched)
                            @if ($sched->day == $day)
                                <tr>
                                    <td>{{ $findBatch->batch_name }}</td>
                                    <td>{{ $findBlock->block_name }}</td>
                                    <td>{{ $sched->room_code }}</td>
                                    <td>{{ $sched->subject_name}}</td>
                                    <td>{{ $sched->teacher_name	 }}</td>
                                    <td>
                                            @if ($sched->time_in && $sched->time_out)
                                                {{ date('h:i A', strtotime($sched->time_in)) }} -
                                                {{ date('h:i A', strtotime($sched->time_out)) }}
                                            @else
                                                Time not available
                                            @endif
                                        </td>
                                    <td>{{ $sched->day }}</td>
                                   
                                    <td>
                                        <form action="" method="POST">
                                            <a href="{{-- Add your edit URL here --}}"
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
