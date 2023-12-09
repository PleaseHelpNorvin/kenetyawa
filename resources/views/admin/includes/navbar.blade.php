


{{-- test --}}

<div class="topnav">
    <a class="logo" href="{{ route('dashboardview')}}"> <i class="fa fa-calendar"></i> SCHEDULING SYSTEM</a>
    <div class="profile-dropdown">
        <button id="profile-button" class="profile-button">
            <img src="{!! asset('images/'.auth()->user()->image) !!}" class="profile-image"> {{ Auth::user()->name}}
        </button>
        <div id="profile-content" class="profile-content">
            <a href="{{ route('profileview')}}">Profile</a>
            {{-- <a href="#" id="settings-link">Settings</a> --}}
            <a href="{{ route('logout')}}">Log Out</a>
        </div>
    </div>
</div>


<div class="sidenav" id="mySidenav">
    <ul class="side-menu">
        <li>===</li>
              {{-- <li class="parent">
            <a href="#" class="toggle-submenu">Schedule</a>
            <ul class="submenu">
                <li> <a href="{{ route('scheduleview') }}"> Calendar</a></li>
                <li><a href="{{ route('teacherscheduleview') }}">Teacher Scheds</a></li>
                <li><a href="{{ route('studentscheduleview') }}">Student Scheds</a></li>
    
            </ul>
        </li> --}}
        <li @if(Request::is('scheduleviewnav*')) class="active" @endif><a href="{{ route('scheduleviewnav')}}"><i class="fa fa-calendar"></i> Schedule</a></li>
        <li @if(Request::is('teacherlist*')) class="active" @endif><a href="{{ route('teacherlistview') }}"><i class="fas fa-chalkboard-teacher"></i> Teacher List</a></li>
        <li @if(Request::is('students*')) class="active" @endif><a href="{{ route('studentview',['batchId' => 'null', 'block' => 'null']) }}" ><i class="fa fa-graduation-cap"></i> Student List</a></li>
        <li @if(Request::is('subjectlist*')) class="active" @endif><a href="{{ route('subjectlistview') }}" ><i class="fa fa-book"></i> Subject List</a></li>
        <li @if(Request::is('roomlist*')) class="active" @endif><a href="{{ route('showroom') }}" ><i class="fa fa-solid fa-hotel"></i> Room List</a></li>
        <li @if(Request::is('reports*')) class="active" @endif><a href="{{ route('reportsview') }}"><i class="fa fa-rocket"></i> Reports</a></li>
    </ul>
</div>

<style>
    .side-menu a.active {
        background-color: white; 
        color: black;
      
    }

        /* Initially hide the submenu */
    .submenu {
        display: none;
    }

    /* Style for the active (clicked) parent item */
    .parent.active .submenu {
        display: block;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Toggle the submenu when the parent is clicked
    $('.toggle-submenu').click(function (e) {
        e.preventDefault();
        $(this).siblings('.submenu').slideToggle();
    });
});
</script>

