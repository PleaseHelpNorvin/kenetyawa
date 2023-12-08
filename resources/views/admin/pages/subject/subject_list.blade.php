@extends('admin.layouts.index')
@section('title', 'Subject List')
@include('modals.subject_list_modal')

@section('content')
<div class="container mt-3">

    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="row">
                <!-- FORM Panel -->
                <div class="col-md-4">
                <form action="{{ route('addsubjectpost') }}" method="POST" id="manage-subject">
    @csrf

    <div class="card">
        <div class="card-header">
            Subject Form
        </div>
        <div class="card-body">
            <input type="hidden" name="id">

            <div class="mb-3">
                <label for="inputSubjectCode" class="form-label">Subject Code</label>
                <input type="text" name="subject_code" class="form-control" id="inputSubjectCode" placeholder="Enter Subject Code">
                @if ($errors->has('subject_code'))
                    <span class="text-danger">{{ $errors->first('subject_code') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="inputSubjectName" class="form-label">Subject Name</label>
                <input type="text" name="Subject_name" class="form-control" id="inputSubjectName" placeholder="Enter Subject Name">
                @if ($errors->has('Subject_name'))
                    <span class="text-danger">{{ $errors->first('Subject_name') }}</span>
                @endif
            </div>

        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="{{ route('subjectlistview') }}" class="btn btn-secondary me-2"><i class="fa fa-window-close"></i> Cancel</a>
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
                            <b>Subject List</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($data as $subject) 
                                    <tr>
                                 
                                        <td class="text-center">{{ $subject->id}}</td>
                                        <td class="">
                                
                                        
                                        <p>Subject Name: <b>{{ $subject->subjectname}}</b></p>
                                          <p>Subject Code: <small><b>{{ $subject->subjectcode}}</b></small></p>

                                        </td>
                                     <td>
                            <form action="{{ route('deletesubject', $subject->id) }}" method="POST">
                            {{-- <form action="{{ route('deletesubject', $subject->id) }}" method="POST"> --}}
                                {{-- <a href="{{ url('editsubject/' . $subject->id) }}" class="btn btn-primary">Edit</a> --}}
                                <a href="{{ route('editsubjectpage', ['id' => $subject->id]) }}"
                                    class="btn btn-primary "><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                {{-- <a type="submit" class="btn btn-danger ">Delete</a> --}}
                                <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                                    </tr>
                                    @empty <p>no data inputed</p>
                                        
                                 @endforelse
                                            

                                </tbody>
                            </table>
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
