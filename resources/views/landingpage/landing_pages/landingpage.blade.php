@extends('landingpage.landing_layouts.landing_index')
@section('title', 'LandingPage')
@section('content' )

    <div class="container">
            
        <h3 class="centered-text">ACCESS AS</h3>
        <a href="{{ route('login')}}" class="rounded-link">Admin</a>
        <a href="/teacherID" class="rounded-link">Teacher</a>
        <a href="/studentID" class="rounded-link">Student</a>
    </div>

@endsection
