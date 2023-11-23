@extends('admin.layouts.index')
@section('title', 'add subject')
{{-- @include('modals.subject_list_modal') --}}

@section('content')
<div class="container">
    <h1>Add Subject</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('addsubjectpost') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputSubjectCode" class="form-label">Subject Code</label>
                    <input type="text" name="subject_code" class="form-control" id="inputSubjectCode" placeholder="Enter Subject Code">
                    
                </div>
                <div class="mb-3">
                    <label for="inputSubjectName" class="form-label"> Subject Name</label>
                    <input type="text" name="Subject_name" class="form-control" id="inputSubjectName" placeholder="Enter Subject Name">
                </div>
                {{-- <div class="mb-3">
                    <label for="inputAction" class="form-label">Action</label>
                    <input type="text" name="" class="form-control" id="inputAction" placeholder="Enter Action">
                </div> --}}
                <div class="text-end">
                    <a href="{{ route('subjectlistview') }}" class="btn btn-secondary me-2">Close</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection