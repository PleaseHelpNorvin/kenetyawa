@extends('admin.layouts.index')

@section('content')
<div class="container">
    <h1>Add Teacher</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('facultyfetch') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputIdNo" class="form-label">ID no</label>
                    <input type="text" name="id_no" class="form-control" id="inputIdNo" placeholder="Enter ID no">
                    
                </div>
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" name="faculty_name" class="form-control" id="inputName" placeholder="Enter Name">
                </div>
                <div class="mb-3">
                    <label for="inputCourse" class="form-label">Course</label>
                    <input type="text" name="faculty_course" class="form-control" id="inputCourse" placeholder="Enter Course">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" name="faculty_email" class="form-control" id="inputEmail" placeholder="Enter Email">
                </div>
                {{-- <div class="mb-3">
                    <label for="inputAction" class="form-label">Action</label>
                    <input type="text" name="" class="form-control" id="inputAction" placeholder="Enter Action">
                </div> --}}
                <div class="text-end">
                    <a href="{{ route('teacherlistview') }}" class="btn btn-secondary me-2">Close</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection
