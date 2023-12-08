@extends('admin.layouts.index')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Welcome, {{ Auth::user()->name }}!</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Teachers</h5>
                                
                                <p class="card-text">{{$teacherCount}}</p>
                                <a href="{{ route('teacherlistview')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Students</h5>
                                <p class="card-text">{{$studentCount}}</p>
                                <a href="{{$studentViewUrl}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Subjects</h5>
                                <p class="card-text">{{$subjectCount}}</p>
                                <a href="{{route('subjectlistview')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Rooms</h5>
                                <p class="card-text">{{$roomCount}}</p>
                                <a href="{{route('showroom')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Reports</h5>
                                <p class="card-text">{{$reportCount}}</p>
                                <a href="{{route('reportsview')}}" class="btn btn-primary">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
