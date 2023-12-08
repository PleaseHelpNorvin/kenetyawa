@extends('admin.layouts.index')
@section('title', 'Student List')
@section('content')

<div class="container">
   
            <form action="{{ route('update.student', ['student' => $selectstudent->id]) }}" method="POST">
                @csrf
                @method('PUT')
              
                <label for="edit_student_student_no">Student No:</label>
                <input type="text" id="edit_student_student_no" name="student_no" class="form-control" value="{{ $selectstudent->student_no }}">
                
                <label for="edit_student_name">Name:</label>
                <input type="text" id="edit_student_name" name="name" class="form-control" value="{{ $selectstudent->name }}">

                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select name="status" class="form-control" id="inputStatus">
                        <option value=""></option>
                        <option value="Regular">Regular</option>
                        <option value="Replacement">Replacement</option>
                        <!-- Add more options if needed -->
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <label for="edit_student_batch">Batch:</label>
                <input type="text" id="edit_student_batch" name="batch" class="form-control" value="{{ $selectstudent->batch }}">
                 
                <label for="edit_student_batch">Section</label>
                <input type="text" id="edit_student_block" name="block" class="form-control" value="{{ $selectstudent->block }}">

                <label for="edit_student_batch">course</label>
                <input type="text" id="edit_student_course" name="course" class="form-control" value="{{ $selectstudent->course }}">
                <label for="edit_student_batch">contact_no</label>
                <input type="text" id="edit_student_contact_no" name="contact_no" class="form-control" value="{{ $selectstudent->contact_no }}">

                <label for="edit_student_batch">email</label>
                <input type="text" id="edit_student_email" name="email" class="form-control" value="{{ $selectstudent->email }}">

                
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
     </div>


@endsection
