@extends('admin.layouts.teacherlayout')
@section('title', 'Schedule')

@section('content')

<div class="container">
    
<div class="topnav">
    <a class="logo" href=""> <i class="fa fa-calendar"></i> SCHEDULING SYSTEM</a>
    <div class="profile-dropdown">

        <div id="profile-content" class="profile-content">
         
            <a href="{{ route('showLandingPage')}}">Log Out</a>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item  ml-5">
                    <a href="{{ route('teacherinfo',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Schedule</a>
                </li>
                <li class="nav-item  ml-5">
                    <a href="{{ route('scheduleviewnav2',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Event </a>
                </li>
                <li class="nav-item  ml-5">
                    <a href="{{ route('reports.viewteacher',['teacher_Id' => $teacher->id]) }}" class="nav-link font-weight-bold text-black">Report </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="row">
                <!-- FORM Panel -->
                <div class="col-md-4">
                    <form action="{{ route('reports.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Report Form
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="status" class="form-control" value="Active">
                                <input type="hidden" name="name" class="form-control" value="{{$teacher->name}}">
                                <!-- Add form fields for reporttitle, description, and image -->
                                <div class="mb-3">
                                    <label for="reporttitle" class="form-label">Report Title:</label>
                                    <input type="text" name="reporttitle" class="form-control">
                                    @error('reporttitle')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea name="description" class="form-control"></textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image:</label>
                                    <input type="file" name="image" accept="image/*" class="form-control">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <a href="{{ route('reports.viewteacher',['teacher_Id' => $teacher->id]) }}" class="btn btn-secondary me-2"><i class="fa fa-window-close"></i> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- FORM Panel -->
                  
                <!-- Table Panel -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <b>Your Report List</b>
                        </div>
                        <div class="card-body">
                            @if($reports->isEmpty())
                                <p>No reports available</p>
                            @else
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Report Title</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $report)
                                            <tr class="{{ $report->status == 'Active' ? 'table-danger' : 'table-success' }}">
                                                <td class="text-center">{{ $report->id }}</td>
                                                <td>{{ $report->reporttitle }}</td>
                                                <td>{{ $report->description }}</td>
                                                <td>
                                                    @if($report->image)
                                                        <img src="{{ asset('images/reports/' . $report->image) }}" alt="Report Image" style="max-width: 50px;">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('deletereport.student', $report->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Table Panel -->
            </div>
        </div>
    </div>
    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
</div>
@endsection
