@extends('admin.layouts.index')

@section('content')
<div class="container mt-0">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Add Teacher</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('facultyfetch') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputIdNo" class="form-label">ID no</label>
                    <input type="text" name="id_no" class="form-control" id="inputIdNo" placeholder="Enter ID no">
                    <!-- Example displaying validation error for ID no -->
                    @if ($errors->has('id_no'))
                        <span class="text-danger">{{ $errors->first('id_no') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" name="faculty_name" class="form-control" id="inputName" placeholder="Enter Name">
                    @if ($errors->has('faculty_name'))
                        <span class="text-danger">{{ $errors->first('faculty_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputCourse" class="form-label">Course</label>
                    <input type="text" name="faculty_course" class="form-control" id="inputCourse" placeholder="Enter Course">
                    @if ($errors->has('faculty_course'))
                        <span class="text-danger">{{ $errors->first('faculty_course') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="text" name="faculty_email" class="form-control" id="inputEmail" placeholder="Enter Email">
                    @if ($errors->has('faculty_email'))
                        <span class="text-danger">{{ $errors->first('faculty_email') }}</span>
                    @endif
                </div>
                {{-- <div class="mb-3">
                    <label for="inputAction" class="form-label">Action</label>
                    <input type="text" name="" class="form-control" id="inputAction" placeholder="Enter Action">
                </div> --}}
        </div>
        <div class="card-footer">
            <!-- Footer content if needed -->
            <div class="text-end">
                <a href="{{ route('teacherlistview') }}" class="btn btn-secondary me-2"><i class="fa fa-window-close"></i></a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"> Save</i></button>
            </div>
        </form>

        </div>
    </div>
</div>
@endsection
