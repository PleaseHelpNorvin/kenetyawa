@extends('admin.layouts.index')
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

    <div class="container mt-0" >
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
        
        <div id='calendar'></div>

    </div>

    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                navLinks: true,
                editable: true,
                events: "getevent",
                displayEventTime: false,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                        var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD');
                        $.ajax({
                            url: "{{ URL::to('createevent') }}",
                            data: 'title=' + title + '&start=' + start + '&end=' + end +
                                '&_token=' + "{{ csrf_token() }}",
                            type: "post",
                            success: function(data) {
                                alert("Added Successfully");
                                $('#calendar').fullCalendar('refetchEvents');
                            }
                        });
                    }
                },
                eventClick: function(event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('deleteevent') }}",
                            data: "&id=" + event.id + '&_token=' + "{{ csrf_token() }}",
                            success: function(response) {
                                if (parseInt(response) > 0) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                    alert("Deleted Successfully");
                                }
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
