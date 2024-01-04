@extends('admin.layouts.index')
@section('title', 'Edit Teacher')
@section('content')
<div class="container mt-0">
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
                            @if ($errors->has('id_no'))
                                <span class="text-danger">{{ $errors->first('id_no') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="faculty_name" class="form-control" id="inputName" placeholder="Enter Name" value="{{ $teachers->name}}">
                            @if ($errors->has('faculty_name'))
                                <span class="text-danger">{{ $errors->first('faculty_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="inputCourse" class="form-label">Course</label>
                            <input type="text" name="faculty_course" class="form-control" id="inputCourse" placeholder="Enter Course" value="{{ $teachers->course}}">
                            @if ($errors->has('faculty_course'))
                                <span class="text-danger">{{ $errors->first('faculty_course') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="text" name="faculty_email" class="form-control" id="inputEmail" placeholder="Enter Email" value="{{ $teachers->email}}">
                            @if ($errors->has('faculty_email'))
                                <span class="text-danger">{{ $errors->first('faculty_email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('teacherlistview') }}" class="btn btn-secondary me-2"><i class="fa fa-window-close"></i></a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"> Save</i></button>
                    </div>
                </div>
            </form>
    
    {{-- </div> --}}
@endsection