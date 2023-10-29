@extends('admin.layouts.index')
@section('title', 'Faculty List')
@include('modals.faculty_list_modal')

@section('content' )

    {{-- <div class="container"> --}}
        <h1>this is FacultyList page</h1>
    {{-- </div> --}}
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        add Teacher
      </button>
      <div class="container mt-5">
        <h2>Faculty List</h2>
        <!-- Search bar -->
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search Faculty">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>    
                    <th>#</th>
                    <th>ID no</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Email</th>
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