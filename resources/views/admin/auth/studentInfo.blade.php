@extends('admin.layouts.studentlayout')

@section('content')


    <p>{{ $student->name }}</p>


<nav class="navbar navbar-expand-lg navbar-light bg-light border">
    <div class="container-fluid">
        <ul class="navbar-nav mx-auto">
        <li class="nav-item">
                <a href="{{route('studentinfo',['id' =>  $student->id] )}}" class="nav-link font-weight-bold">Schedule</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('scheduleviewnav1',['id' =>  $student->id])}}" class="nav-link font-weight-bold">Event </a>
            </li>
           
        </ul>
    </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-light bg-light border">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                <li class="nav-item" style="margin-right: 0px;">
                    <a class="nav-link text-center font-weight-bold" href="" disable>{{ $day }} </a>
                    
                    <!-- Add a card for each day based on the schedule -->
                    @foreach ($schedule as $schedules)
                        @if($schedules->day == $day)
                            <div class="card bg-success text-white" style="width: 10rem; height: 8rem; overflow: hidden;">
                                <div class="card-body">
                                    <p class="card-text small-text">
                                        {{ \Carbon\Carbon::parse($schedules->time_in)->format('h:i A') }}
                                        -
                                        {{ \Carbon\Carbon::parse($schedules->time_out)->format('h:i A') }}
                                    </p>
                                    <h5 class="card-title small-text">
                                        Subject: {{ $schedules->subject_name }}
                                    </h5>
                                    <p class="card-text small-text">
                                        Teacher: {{ $schedules->teacher_name }}
                                    </p>
                                    <p class="card-text small-text">
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

<style>
    .small-text {
        font-size: 13px; /* Adjust the font size as needed */
    }

    .navbar.border {
        border-left: 1px solid #dee2e6; /* Left border color */
        border-right: 1px solid #dee2e6; /* Right border color */
    }
</style>

@endsection
