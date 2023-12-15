@extends('admin.layouts.studentlayout')
@section('title', 'Schedule')

@section('content')

<div class="container mt-3">
<nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{ route('studentinfo',['id' => $student->id]) }}" class="nav-link font-weight-bold text-black">Schedule</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('scheduleviewnav1',['id' => $student->id]) }}" class="nav-link font-weight-bold text-black">Event </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports.view',['id' => $student->id]) }}" class="nav-link font-weight-bold text-black">Report </a>
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
                                <!-- Add form fields for reporttitle, description, and image -->
                                <div class="mb-3">
                                    <label for="reporttitle" class="form-label">Report Title:</label>
                                    <input type="text" name="reporttitle" class="form-control" required>
                                    @error('reporttitle')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea name="description" class="form-control" required></textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image:</label>
                                    <input type="file" name="image" accept="image/*" class="form-control" required>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <a href="{{ route('studentinfo',['id' => $student->id]) }}"
                                            class="btn btn-secondary me-2"><i class="fa fa-window-close"></i> Cancel</a>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- FORM Panel -->

              
    </div>
    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
</div>
@endsection
