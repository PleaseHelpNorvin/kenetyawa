@extends('admin.layouts.index')
@section('title', 'Edit Teacher')
@section('content')
<div class="container">
    {{-- <div class="container"> --}}
    {{-- @if(isset($teacher)) --}}
    
        <form action="{{ url('updateTeacher/'.$teachers->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h1>Edit Teacher {{ $teachers->name}}</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="inputIdNo" class="form-label">ID no</label>
                            <input type="text" name="id_no" class="form-control" id="inputIdNo" placeholder="Enter ID no" value="{{ $teachers->id_no}}">
                        </div>
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="faculty_name" class="form-control" id="inputName" placeholder="Enter Name" value="{{ $teachers->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="inputCourse" class="form-label">Course</label>
                            <input type="text" name="faculty_course" class="form-control" id="inputCourse" placeholder="Enter Course" value="{{ $teachers->course}}">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="faculty_email" class="form-control" id="inputEmail" placeholder="Enter Email" value="{{ $teachers->email}}">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('teacherlistview') }}" class="btn btn-secondary me-2">Close</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
    
    {{-- </div> --}}
@endsection