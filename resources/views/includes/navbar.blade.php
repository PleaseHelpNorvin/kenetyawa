<div class="topnav">
    <a class = "logo" href="{{ route('homeview')}}">SCHEDULING SYSTEM</a>
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
        {{-- <li><a href="{{ route('homeview')}}">Home</a></li> --}}
        <li><a href="{{ route('dashboardview')}}">Dashboard</a></li>
        <li><a href="{{ route('schedule')}}">Schedule</a></li>
        <li><a href="#">Course List</a></li>
        <li><a href="#">Teachers List</a></li>
        <li><a href="#">Subject List</a></li>
        <li><a href="#">Reports</a></li>

    </ul>
</div>