@extends('admin.layouts.index')
@section('title', 'Subject List')
{{-- @include('modals.subject_list_modal') --}}

@section('content')
    

    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        add Subject
      </button> --}}

    <div class="container mt-5">
        <h2>Subject List</h2>
        <div class="form-group">
        <a href="{{ route('addsubjectpage') }}" class="btn btn-primary">Add Subject</a>
        </div>
        <!-- Search bar -->
        <div class="form-group">
            <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('subject.search') }}">
                <input class="form-control mr-sm-3" name="search_subject" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        {{-- <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search Subject"> --}}
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Faculty data goes here -->
                @forelse ($data as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->subjectcode }}</td>
                        <td>{{ $subject->subjectname }}</td>
                        <td>
                            <form action="{{ route('deletesubject', $subject->id) }}" method="POST">
                            {{-- <form action="{{ route('deletesubject', $subject->id) }}" method="POST"> --}}
                                {{-- <a href="{{ url('editsubject/' . $subject->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                                <a href="{{ route('editsubjectpage', ['id' => $subject->id]) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                @csrf
                                @method('DELETE')
                                {{-- <a type="submit" class="btn btn-danger btn-sm">Delete</a> --}}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <p>no data inputed</p>
                @endforelse

            </tbody>
        </table>
        <!-- Pagination -->
        {!! $data->links() !!}
    </div>
@endsection
