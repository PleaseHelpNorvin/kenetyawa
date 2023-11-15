@extends('landingpage.landing_layouts.landing_index')
@section('title', 'LandingPage')
@section('content' )

<div class="container">
    <h3 class="centered-text">ACCESS AS</h3>
    <a href="{{ route('login')}}" class="bn31">
        <span class="bn31span">Admin</span>
    </a>
    <a href="/teacherID" class="bn31">
        <span class="bn31span">Teacher</span>
    </a>
    <a href="/studentID" class="bn31">
        <span class="bn31span">Student</span>
    </a>
</div>

@endsection
