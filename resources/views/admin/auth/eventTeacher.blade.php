@extends('admin.layouts.teacherlayout')
@section('title', 'Schedule')

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
            /* Set the text color to black for the active link */
            /* Additional styles for the active state */
        }
    </style>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

    <div class="container" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item  ml-5">
                    <a href="{{ route('teacherinfo',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Schedule</a>
                </li>
                <li class="nav-item  ml-5">
                    <a href="{{ route('scheduleviewnav2',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Event </a>
                </li>
                <li class="nav-item  ml-5">
                    <a href="{{ route('reports.viewteacher',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Report </a>
                </li>
            </ul>
        </div>
    </nav>
        <div id='calendar'></div>

    </div>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                events: {
                    url: '{{ route("getevents") }}',
                    method: 'GET',
                    textColor: 'white'
                }
            });
        });
    </script>
@endsection
