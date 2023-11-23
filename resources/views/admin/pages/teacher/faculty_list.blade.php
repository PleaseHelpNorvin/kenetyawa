@extends('admin.layouts.index')
@section('title', 'Teacher List')

@section('content')
    <div class="container mt-5">
        <h2>Teacher List</h2>

        <div class="form-group">
            <a href="{{ route('addteacher') }}" class="btn btn-primary">Add Teacher</a>
        </div>

         <!-- Search bar -->
         <div class="form-group">
            <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('faculty.search') }}">
                <input class="form-control mr-sm-3" name="search_faculty" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID no</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Faculty data goes here -->
                @forelse ($data as $teachers)
                    <tr>
                        <td>{{ $teachers->id }}</td>
                        <td>{{ $teachers->id_no }}</td>
                        <td>{{ $teachers->name }}</td>
                        <td>{{ $teachers->course }}</td>
                        <td>{{ $teachers->email }}</td>
                        <td>
                            <form action="{{ route('deletefaculty', $teachers->id) }}" method="POST">
                                <a href="{{ url('editteacher' . $teachers->id) }}" class="btn btn-success btn-sm">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        {!! $data->links() !!}
    </div>

    <style>
        .pagination {
            display: flex;
            justify-content: center;
        }

        .pagination li {
            margin: 0 5px;
        }
    </style>
@endsection
