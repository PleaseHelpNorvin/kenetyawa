@extends('admin.layouts.index')
@section('title', 'Dashboard')
@section('content' )

    {{-- <div class="container"> --}}
        <h1>this is dashboard page</h1>
        <h2>Welcome, {{ Auth::user()->name}}!</h2>
    {{-- </div> --}}
@endsection