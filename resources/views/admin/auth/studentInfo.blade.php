@extends('admin.layouts.studentlayout')

@section('content')

<div class="container">




    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{ route('studentinfo',['id' => $student->id]) }}" class="nav-link font-weight-bold text-black">Schedule</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('scheduleviewnav1',['id' => $student->id]) }}" class="nav-link font-weight-bold text-black">Event </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports.view',['id' => $student->id]) }}" class="nav-link font-weight-bold text-black">Report </a>
                </li>
            </ul>
        </div>
    </nav>


    
 @if($student->status == 'Regular')

    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                    <li class="nav-item" style="margin-right: 0px;">
                        <a class="nav-link text-center font-weight-bold text-black" href="" disable>{{ $day }} </a>
                        
                        <!-- Add a card for each day based on the schedule -->
                        @foreach ($schedule as $schedules)
                            @if($schedules->day == $day)
                                <div class="card bg-success text-white mb-3" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <p class="card-text small-text text-black">
                                            {{ \Carbon\Carbon::parse($schedules->time_in)->format('h:i A') }}
                                            -
                                            {{ \Carbon\Carbon::parse($schedules->time_out)->format('h:i A') }}
                                        </p>
                                        <h5 class="card-title small-text text-black">
                                            Subject: {{ $schedules->subject_name }}
                                        </h5>
                                        <p class="card-text small-text text-black">
                                            Teacher: {{ $schedules->teacher_name }}
                                        </p>
                                        <p class="card-text small-text text-black">
                                            Room: {{ $schedules->room_code }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
    @else

    
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                    <li class="nav-item" style="margin-right: 0px;">
                        <a class="nav-link text-center font-weight-bold text-black" href="" disable>{{ $day }} </a>
                        
                        <!-- Add a card for each day based on the schedule -->
                        @foreach ($schedule as $schedules)
                            @if($schedules->day == $day)
                                <div class="card bg-warning text-white mb-3" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <p class="card-text small-text text-black">
                                            {{ \Carbon\Carbon::parse($schedules->time_in)->format('h:i A') }}
                                            -
                                            {{ \Carbon\Carbon::parse($schedules->time_out)->format('h:i A') }}
                                        </p>
                                        <h5 class="card-title small-text text-black">
                                            Subject: {{ $schedules->subject_name }}
                                        </h5>
                                        <p class="card-text small-text text-black">
                                            Teacher: {{ $schedules->teacher_name }}
                                        </p>
                                        <p class="card-text small-text text-black">
                                            Room: {{ $schedules->room_code }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
    
    @endif
    <style>
        .small-text, .text-black {
            font-size: 13px; /* Adjust the font size as needed */
            color: black; /* Set text color to black */
        }

        .navbar.border {
            border-left: 1px solid #dee2e6; /* Left border color */
            border-right: 1px solid #dee2e6; /* Right border color */
        }

        /* Adjust the container width */
        .container {
            max-width: 1200px; /* Change this value as needed */
        }
    </style>

</div>

@endsection
