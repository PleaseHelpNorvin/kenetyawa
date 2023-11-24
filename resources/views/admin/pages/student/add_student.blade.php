@extends('admin.layouts.index')
@section('title', 'Student List')
@section('content')



<div class="container">
    <h5>Add Student to @if ($selectedBatch)  {{ $selectedBatch->batch_name }}  and  {{ $selectedBlock->block_name }}@endif </h5>
    <form action="{{ route('add.savestudent', ['batchId' => $selectedBatch->id, 'block' => $selectedBlock->id]) }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="inputStudentNo">Student No</label>
            <input type="text" name="student_no" class="form-control" id="inputStudentNo" placeholder="Enter Student number">
            @error('student_no')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="student_name" class="form-control" id="inputName" placeholder="Enter Name">
            @error('student_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>



        <label for="student_batch" class="visually-hidden">Batch ID</label>
        <input type="hidden" name="student_batch" value="{{ $selectedBatch->id }}" id="student_batch">

            <label for="student_block" class="visually-hidden">Block ID</label>
            <input type="hidden" name="student_block" value="{{ $selectedBlock->id }}" id="student_block">



        <div class="form-group">
            <label for="inputCourse">Course</label>
            <input type="text" name="student_course" class="form-control" id="inputCourse" placeholder="Enter Course">
            @error('student_course')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputContact">Contact No</label>
            <input type="text" name="student_contact_no" class="form-control" id="inputContact" placeholder="Enter contact number">
            @error('student_contact_no')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="student_email" class="form-control" id="inputEmail" placeholder="Enter Email">
            @error('student_email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
    </form>
</div>

@endsection
