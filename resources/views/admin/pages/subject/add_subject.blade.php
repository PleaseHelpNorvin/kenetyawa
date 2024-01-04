@extends('admin.layouts.index')
@section('title', 'add subject')
{{-- @include('modals.subject_list_modal') --}}

@section('content')
<div class="container mt-0">
    <h1>Add Subject</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('addsubjectpost') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputSubjectCode" class="form-label">Subject Code</label>
                    <input type="text" name="subject_code" class="form-control" id="inputSubjectCode" placeholder="Enter Subject Code">
                    @if ($errors->has('subject_code'))
                        <span class="text-danger">{{ $errors->first('subject_code') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputSubjectName" class="form-label"> Subject Name</label>
                    <input type="text" name="Subject_name" class="form-control" id="inputSubjectName" placeholder="Enter Subject Name">
                    @if ($errors->has('Subject_name'))
                        <span class="text-danger">{{ $errors->first('Subject_name') }}</span>
                    @endif      
                </div>
                <div class="text-end">
                    <a href="{{ route('subjectlistview') }}" class="btn btn-secondary me-2"><i class="fa fa-window-close"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"> Save</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection