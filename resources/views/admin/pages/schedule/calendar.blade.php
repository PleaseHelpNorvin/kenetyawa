@extends('admin.layouts.index')
@section('title', 'Schedule')
@include('modals.schedule_modal')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light border">
  <div class="container-fluid">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a href="{{ route('scheduleview',['teacherID' => 'null'])}}" class="nav-link">Teacher Schedule</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('studentschedule')}}" class="nav-link">Student Schedule</a>
          </li>
        
      </ul>
  </div>
</nav>

<div class="container">
    <!-- Your other content goes here -->

    <!-- Calendar container -->
    <div id="calendar"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // or 'timeGridWeek', 'timeGridDay', etc.
                events: [
                    // Your events data here
                    // Example: { title: 'Event 1', start: '2023-11-01' },
                    // Add events dynamically based on your data
                ],
            });

            calendar.render();
        });
    </script>

@endsection
