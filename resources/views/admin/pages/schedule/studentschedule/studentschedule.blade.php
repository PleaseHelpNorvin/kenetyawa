@extends('admin.layouts.index')
@section('title', 'Student List')
{{-- @include('modals.add_student_modal') --}}

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
  
@endsection
