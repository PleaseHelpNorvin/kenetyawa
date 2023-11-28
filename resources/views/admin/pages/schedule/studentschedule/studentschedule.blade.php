@extends('admin.layouts.index')
@section('title', 'StudentSchedule ')

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
                      class="nav-link {{ request()->routeIs('studentscheduleview') ? 'active' : '' }}">Student Schedule</a>
              </li>
          </ul>
      </div>
  </nav>

  <h1>This is student schedule</h1>


@endsection