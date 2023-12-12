@extends('admin.layouts.studentlayout')

@section('content')

<div>
<h1>{{ $student->name }}</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light border">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href=""
                            class="nav-link ">Event </a>
                    </li>
                    <li class="nav-item">
                        <a href=""
                            class="nav-link ">Schedule</a>
                    </li>
                   
                </ul>
            </div>
        </nav>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                <li class="nav-item" style="margin-right: 0px;">
                    <a class="nav-link" href="#">{{ $day }}</a>

                    <!-- Add a card for each day based on the schedule -->
                    @foreach ($schedule as $schedules)
                        @if($schedules->day == $day)
                            <div class="card" style="width: 10rem; height: 8rem; overflow: hidden;">
                                <div class="card-body">
                                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ $schedules->time_in }}-{{ $schedules->time_out }}
                                    </p>
                                    <h5 class="card-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        Subject: {{ $schedules->subject_name }}
                                    </h5>
                                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        Teacher: {{ $schedules->teacher_name }}
                                    </p>
                                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
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
@endsection
