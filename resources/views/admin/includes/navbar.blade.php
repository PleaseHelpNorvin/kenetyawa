<div class="topnav">
    <a class = "logo" href="{{ route('dashboardview')}}">SCHEDULING SYSTEM</a>
    <div class="profile-dropdown">
        <button id="profile-button" class="profile-button">
            <img src="{!! asset('images/'.auth()->user()->image) !!}"  class="profile-image"> {{ Auth::user()->name}}
        </button>
        <div id="profile-content" class="profile-content">
            <a href="{{ route('profileview')}}">Profile</a>
            <a href="">Settings</a>
            <a href="{{ route('logout')}}">Log Out</a>
        </div>
    </div>
</div>

<div class="sidenav" id="mySidenav">
    <ul class="side-menu">
        <li><a href="#">---</a></li>
        <li><a href="{{ route('scheduleview')}}">Schedule</a></li>
        <li><a href="{{ route('teacherlistview')}}">Faculty List</a></li>
        <li><a href="{{ route('subjectlistview')}}">Subject List</a></li>
        <li><a href="{{ route('reportsview')}}">Reports</a></li>

    </ul>
</div>