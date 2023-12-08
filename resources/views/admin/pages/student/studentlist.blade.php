@extends('admin.layouts.index')
@section('title', 'Student List')
@include('admin.pages.student.delete_batch_modal')
@include('admin.pages.student.delete_block_modal')

@section('content')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            margin-right: 16%;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #DeleteBatch {
            position: relative;
            left: 136px;
            top: 10px;
            transform: translateY(-35%);
        }

        /* batches nav positioning */
        #AddBatch {
            position: relative;
            left: 339px;
            top: 22px;
            transform: translateY(-35%);
        }

        #batch_name {
            position: relative;
            left: 359px;
            top: 22px;
            transform: translateY(-35%);
        }

        /* blocks nav positioning */
        #myBtn2 {
            position: relative;
            left: 417px;
            top: -24px;
            transform: translateY(-35%);

        }

        #addBlock {
            position: relative;
            left: 167px;
            top: 32px;
            transform: translateY(-35%);
        }

        #blockName {
            position: relative;
            left: 187px;
            top: 22px;
            */ transform: translateY(-35%);
        }

        #deleteStudent {
            position: relative;
            top: 7px
        }

        #blockNav {
            padding: 0px
        }
    </style>

    <div class="container mt-3">
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
                    @endforeach
                </ul>
                <form action="{{ route('add.batch') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" id="batch_name" name="batch_name" class="form-control" required>
                            @error('batch_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <button type="submit" id="AddBatch" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Batch</button>
                        </div>
                    </div>
                </form>
                <button type="submit" id="DeleteBatch" class="btn btn-danger">Delete Batch</button>
            </div>
        </nav>
        {{-- Batch --}}
        @if ($selectedBatch)
            <h2>Blocks for {{ $selectedBatch->batch_name }}</h2>
            @if ($blocks)
                <nav class="navbar navbar-expand-lg navbar-light bg-light border">
                    <div id="blockNav" class="container-fluid">
                        <ul class="navbar-nav">
                            @foreach ($blocks as $block)
                                <li class="nav-item">
                                    <a href="{{ route('studentview', ['batchId' => $batch_id, 'block' => $block]) }}"
                                        class="nav-link">
                                        {{ $block->block_name }}
                                    </a>
                                </li>
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
                                        <button type="submit" id="addBlock" class="btn btn-primary"><i
                                                class="fa fa-plus"></i>
                                            Block</button>
                                    </div>
                                </div>
                            </form>
                            <button id="myBtn2" class="btn btn-danger">Delete Block</button>
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
                class="btn btn-primary"><i class="fa fa-plus"></i> Student
            </a>

            <a href="{{ route('studentview.status', ['batch_id' => $batch_id, 'block' => $block, 'status' => 'regular']) }}"
                class="btn btn-success">
                Show Regular Students
            </a>

            <a href="{{ route('studentview.status', ['batch_id' => $batch_id, 'block' => $block, 'status' => 'replacement']) }}"
                class="btn btn-warning">
                Show Replacement Students
            </a>

            <a href="{{ route('studentview', ['batchId' => $batch_id, 'block' => $block]) }}" 
                class="btn btn-info">
                Show All Students
            </a> 
            {{-- studentview', ['batchId' => $batch_id, 'block' => $block] --}}
        @endif

        @if ($students && count($students) > 0)
            <h2>Students for {{ $selectedBatch->batch_name }} </h2>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Student No</th>
                            <th>Status</th>
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
                                <td>{{ $student->status }}</td>
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

                                        <div style="width: 10px;"></div>

                                        <form action="{{ route('delete.student', ['student' => $student->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this student?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" id="deleteStudent"><i
                                                    class="fas fa-trash"></i></button>

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

    </div>

    <script>
        // Get the first modal elements
        var modal1 = document.getElementById("deleteBatchModal");
        var btn1 = document.getElementById("DeleteBatch");
        var span1 = document.getElementsByClassName("close1")[0];

        // Get the second modal elements
        var modal2 = document.getElementById("myModal2");
        var btn2 = document.getElementById("myBtn2");
        var span2 = document.getElementsByClassName("close2")[0];

        // Event listeners to open/close First Modal
        btn1.onclick = function() {
            modal1.style.display = "block";
        };
        span1.onclick = function() {
            modal1.style.display = "none";
        };
        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        };

        // Event listeners to open/close Second Modal
        btn2.onclick = function() {
            modal2.style.display = "block";
        };
        span2.onclick = function() {
            modal2.style.display = "none";
        };
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        };
    </script>

@endsection
