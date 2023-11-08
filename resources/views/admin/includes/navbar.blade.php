


{{-- test --}}

<div class="topnav">
    <a class="logo" href="{{ route('dashboardview')}}">SCHEDULING SYSTEM</a>
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
        {{-- <li @if(Request::is('dashboard*')) class="active" @endif><a href="{{ route('dashboardview') }}">Dashboard</a></li> --}}
        <li @if(Request::is('schedule*')) class="active" @endif><a href="{{ route('scheduleview') }}" >Schedule</a></li>
        <li  @if(Request::is('teacherlist*')) class="active" @endif><a href="{{ route('teacherlistview') }}">Faculty List</a></li>
        <li @if(Request::is('subjectlist*')) class="active" @endif><a href="{{ route('subjectlistview') }}" >Subject List</a></li>
        <li @if(Request::is('students*')) class="active" @endif><a href="{{ route('studentview') }}" >Student List</a></li>
        <li  @if(Request::is('reports*')) class="active" @endif><a href="{{ route('reportsview') }}">Reports</a></li>
        {{-- <li  @if(Request::is('students*')) class="active" @endif><a href="{{ route('studentview') }}">Reports</a></li> --}}
        {{-- <li @if(Request::is('reports*')) class="active" @endif><a href="{{ route('reportsview') }}">Porn Star List</a></li> --}}
    </ul>
</div>

<style>
    .side-menu a.active {
        background-color: while; 
        color: black;
      
    }
</style>