@extends('admin.layouts.index')
@section('title', 'Student List')
@include('modals.add_student_modal')

@section('content')


    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myAddStudentModal">
            Add Student
        </button>
        <br><br>
        <form action="">
            <button type="submit" class="btn btn-primary">Add Batch</button>
        </form>

        <!-- Batch links -->
        <div class="batch-links">
            @foreach ($batches as $batch)
                <a href="{{ route('studentview', ['batchId' => $batch->id, 'block' => 'null']) }}"
                    class="nav-link">{{ $batch->batch_name }}</a>
            @endforeach


            {{-- //Batch --}}
            @if ($selectedBatch)
                <h2>Blocks for {{ $selectedBatch->batch_name }}</h2>
                @if ($blocks)
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <ul class="navbar-nav">
                                @foreach ($blocks as $block)
                                    <li class="nav-item">
                                        <a href=" {{ route('studentview', ['batchId' => $batch_id, 'block' => $block]) }}"
                                            class="nav-link">
                                            {{ $block->block_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                @else
                    <p>No blocks found for the selected batch.</p>
                @endif
            @else
                <p>No batch selected.</p>
            @endif



            {{-- student lisitng --}}

            @if ($students)
                <h2>Students for Batch </h2>
                @if ($students && count($students) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Student No</th>
                                    <th>Name</th>
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
                                        <td>{{ $student->block }}</td>
                                        <td>{{ $student->course }}</td>
                                        <td>{{ $student->contact_no }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td><button class="btn btn-success"> Edit</button> <button class="btn btn-danger">
                                                Delete</button> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    {{-- <p>No students found for the selected batch and block.</p> --}}
                @endif
            @else
                {{-- <p>No batch or block selected.</p> --}}
            @endif


        </div>




        @yield('content')

    @endsection
