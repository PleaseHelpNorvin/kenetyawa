@extends('admin.layouts.index')
@section('title', 'Student List')
@section('content')


    <!-- Batch links -->
    <h2>Select Batch</h2>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <ul class="navbar-nav">
                
                @foreach ($batches as $batch)
                    <li class="nav-item">
                        <a href="{{ route('studentview', ['batchId' => $batch->id, 'block' => 'null']) }}"
                            class="nav-link">{{ $batch->batch_name }}</a>
                    </li>
                    <form action="{{ route('deleteBatch', ['batchId' => $batch->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this batch and associated blocks & students?')"><i
                                class="fas fa-trash"></i></button>
                    </form>
                @endforeach
            </ul>
            <form action="{{ route('add.batch') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" id="batch_name" name="batch_name" class="form-control" required>
                        @error('batch_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Add Batch</button>

                    </div>

                </div>
            </form>
        </div>
    </nav>

    {{-- Batch --}}
    @if ($selectedBatch)
        <h2>Blocks for {{ $selectedBatch->batch_name }}</h2>
        @if ($blocks)
            <nav class="navbar navbar-expand-lg navbar-light bg-light border">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        @foreach ($blocks as $block)
                            <li class="nav-item">
                                <a href="{{ route('studentview', ['batchId' => $batch_id, 'block' => $block]) }}"
                                    class="nav-link">
                                    {{ $block->block_name }}
                                </a>
                            </li>
                            <!-- Blade Template for Deleting Block -->
                            <form action="{{ route('deleteBlock', ['block_id' => $block->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this block and associated students?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </form>
                        @endforeach
                    </ul>
                    <div>
                        <form action="{{ route('add.block') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" id="blockName" name="block_name" class="form-control">
                                    <input type="hidden" name="batch_id" value="{{ $selectedBatch->id }}">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Add Block</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        @else
            <p>No blocks found for the selected batch.</p>
        @endif
    @else
        <p>No batch selected.</p>
    @endif

    {{-- Student listing --}}
    @if ($selectedBlock)
        <br>
        <a href="{{ route('add.student', ['batchId' => $batch_id, 'block' => $selectedBlock->id]) }}"
            class="btn btn-primary">Add Student</a>
    @endif

    @if ($students && count($students) > 0)
        <h2>Students for {{ $selectedBatch->batch_name }} </h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Student No</th>
                        <th>Name</th>
                        <th>Batch</th>
                        <th>Section</th>
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
                            @if ($selectedBlock)
                                <td> {{ $selectedBlock->block_name }}</td>
                            @endif
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->contact_no }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('view.student', ['student' => $student->id]) }}"
                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                    <!-- Spacer (Adjust the size based on your preference) -->
                                    <div style="width: 10px;"></div>

                                    <!-- Delete Button -->
                                    <form action="{{ route('delete.student', ['student' => $student->id]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this student?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

                                    </form>
                                </div>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No students found for the selected batch and block.</p>
    @endif



@endsection
