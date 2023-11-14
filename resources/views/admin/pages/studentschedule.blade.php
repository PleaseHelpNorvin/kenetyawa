@extends('admin.layouts.index')
@section('title', 'Student List')
{{-- @include('modals.add_student_modal') --}}

@section('content')
    <h2 class="mt-4">School Data</h2>

    <div class="container mt-3">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="batchDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Batches
            </button>
            <div class="dropdown-menu" aria-labelledby="batchDropdown">
                <a class="dropdown-item" href="#" data-batch="1">Batch 1</a>
                <a class="dropdown-item" href="#" data-batch="2">Batch 2</a>
                <a class="dropdown-item" href="#" data-batch="3">Batch 3</a>
            </div>
        </div>

        <div class="table-responsive mt-3">
            <table id="example" class="table table-striped table-bordered" style="width:100%">  
                <thead>
                    <tr>
                        <th>Block</th>
                        <th>Students</th>
                        <th>Teacher Schedules</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <button class="btn btn-secondary block-button" data-batch="1" data-block="Block A">Block A</button>
                            <button class="btn btn-secondary block-button" data-batch="1" data-block="Block B">Block B</button>
                            <button class="btn btn-secondary block-button" data-batch="2" data-block="Block A">Block A</button>
                        </td>
                        <td>
                            <ul class="list-group student-list" data-block="" data-batch="">
                                <!-- Student list items will be dynamically added here -->
                                <li class="list-group-item">Student 1</li>
                                <li class="list-group-item">Student 2</li>
                                <li class="list-group-item">Student 3</li>
                            </ul>
                        </td>
                        <td>
                            <table class="table table-striped teacherschedule" data-block="" data-batch="">
                                <thead>
                                    <tr>
                                        <th>Teacher</th>
                                        <th>Subject</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Teacher schedule rows will be dynamically added here -->
                                    <tr>
                                        <td>Teacher A</td>
                                        <td>Math</td>
                                        <td>Monday</td>
                                        <td>10:00 AM - 12:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Teacher B</td>
                                        <td>Science</td>
                                        <td>Wednesday</td>
                                        <td>2:00 PM - 4:00 PM</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- {!! $products->onEachSide(6)->links() !!} --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap5.min.js"></script> --}}

    <script>
        // new DataTable('#example');
        $(document).ready(function(){
            $('#example').DataTable();
        });

        $(document).ready(function () {
            $('.dropdown-item').click(function () {
                const batch = $(this).data('batch');
                $('.dropdown-toggle#batchDropdown').html(`Batch ${batch}`);
            });

            $('.block-button').click(function () {
                const block = $(this).data('block');
                const batch = $(this).data('batch');
                $('.student-list[data-block]').hide();
                $(`.student-list[data-block="${block}"][data-batch="${batch}"]`).show();
                $('.teacherschedule[data-block]').hide();
                $(`.teacherschedule[data-block="${block}"][data-batch="${batch}"]`).show();
            });
        });
    </script>
@endsection
