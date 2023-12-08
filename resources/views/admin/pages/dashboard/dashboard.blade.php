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
                                <p class="card-text">Manage teachers' information.</p>
                                <a href="#" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Students</h5>
                                <p class="card-text">View and manage student details.</p>
                                <a href="#" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Subjects</h5>
                                <p class="card-text">Explore and manage subjects.</p>
                                <a href="#" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Rooms</h5>
                                <p class="card-text">Manage classroom details.</p>
                                <a href="#" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Other Content</h5>
                                <p class="card-text">Additional content or wide view cards can be placed here.</p>
                                <a href="#" class="btn btn-primary">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
