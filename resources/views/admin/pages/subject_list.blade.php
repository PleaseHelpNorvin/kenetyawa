@extends('admin.layouts.index')
@section('title', 'Subject List')
@include('modals.subject_list_modal')

@section('content')
    <h1>This is a Subject List Page</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        add Subject
      </button>
      <div class="container mt-5">
        <h2>Subject List</h2>
        <!-- Search bar -->
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search Subject">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>    
                    <th>#</th>
                    <th>Subject Code</th>
                    {{-- <th></th> --}}
                    {{-- <th>Subject</th>
                    <th>Email</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Faculty data goes here -->
            </tbody>
        </table>
        <!-- Pagination -->
        <ul id="pagination" class="pagination"></ul>
    </div>
@endsection