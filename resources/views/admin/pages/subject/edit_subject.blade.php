@extends('admin.layouts.index')
@section('title', 'add subject')

@section('content')
<div class="container">
    <h1>Edit Subject</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('updatesubject', ['id' =>$subject->id] )}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="inputSubjectCode" class="form-label">Subject Code</label>
                    <input type="text" name="subject_code" class="form-control" id="inputSubjectCode" placeholder="Enter Subject Code" value="{{$subject->subjectcode}}">
                    
                </div>
                <div class="mb-3">
                    <label for="inputSubjectName" class="form-label"> Subject Name</label>
                    <input type="text" name="Subject_name" class="form-control" id="inputSubjectName" placeholder="Enter Subject Name" value="{{$subject->subjectname}}">
                </div>
                {{-- <div class="mb-3">
                    <label for="inputAction" class="form-label">Action</label>
                    <input type="text" name="" class="form-control" id="inputAction" placeholder="Enter Action">
                </div> --}}
                <div class="text-end">
                    <a href="{{ route('subjectlistview') }}" class="btn btn-secondary me-2"><i class="fa fa-window-close"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection