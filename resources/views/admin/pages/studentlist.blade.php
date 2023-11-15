@extends('admin.layouts.index')
@section('title', 'Student List')
@include('modals.add_student_modal')
@include('modals.edit_student_modal')



@section('content')

<div class="container">
    <!-- Batch links -->
    <h2>Select Batch</h2>
    <nav class="navbar navbar-expand-lg navbar-light bg-light  border" >
        <div class="container-fluid">
            <ul class="navbar-nav">
                 
                @foreach ($batches as $batch)
                    <li class="nav-item">
                        <a href="{{ route('studentview', ['batchId' => $batch->id, 'block' => 'null']) }}" class="nav-link">{{ $batch->batch_name }}</a>
                    </li>
                @endforeach
                
            </ul>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBatchModal">
                Add Batch
            </button>
        </div>
    </nav>

    {{-- //Batch --}}
    @if ($selectedBatch)
        <h2>Blocks for {{ $selectedBatch->batch_name }}</h2>
        @if ($blocks)
            <nav class="navbar navbar-expand-lg navbar-light bg-light border">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        @foreach ($blocks as $block)
                            <li class="nav-item">
                                <a href="{{ route('studentview', ['batchId' => $batch_id, 'block' => $block]) }}" class="nav-link">
                                    {{ $block->block_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlockModal">
            Add Block
        </button>
        
                </div>
            </nav>
       
        @else
            <p>No blocks found for the selected batch.</p>
        @endif
        
    @else
        <p>No batch selected.</p>
    @endif

    

    {{-- student listing --}}
    @if ($students)
    <br>    
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myAddStudentModal">
        Add Student
            </button>      @endif
    @if ($students && count($students) > 0)
    
        <h2>Students for {{ $selectedBatch->batch_name }} </h2>
        <div class="table-responsive">
     
       <br><br>
            <table class="table table-bordered table-hover">
                
                <thead class="thead-light">
                    <tr>
                        <th>Student No</th>
                        <th>Name</th>
                        <th>Batch</th>
                        <th>Block</th>
                        <th>Course</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->student_no }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $selectedBatch->batch_name }}</td>
                            @if ($selectedBlock) <td> {{ $selectedBlock->block_name }}</td> @endif
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->contact_no }}</td>
                            <td>{{ $student->email }}</td>
                            <td>

                              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editStudentModal{{ $student->id }}">Edit</button>
                   <!-- Edit Student Modal -->
                
                            <form action="{{ route('delete.student', ['student' => $student->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                              @csrf
                                  @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                                     </form>
                               
                            </td>
                        </tr>
                    @endforeach
                 
                </tbody>
            </table>
        </div>
    @else
    
        <p>No students found for the selected batch and block.</p>
    @endif

</div>


<!-- Add Block Modal -->
<div class="modal fade" id="addBlockModal" tabindex="-1" aria-labelledby="addBlockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('add.block') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addBlockModalLabel">Add Block</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields for adding a block here -->
                    <!-- Example: Block Name input field -->
                    <label for="blockName">Block Name:</label>
                    <input type="text" id="blockName" name="block_name" class="form-control">

                    <label for="batchSelect">Batch Name:</label>
                    <select class="form-select" aria-label="Default select example" name="batch_id" id="batchSelect">
                        @foreach ($batches as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Block</button>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection
