@extends('admin.layouts.index')
@section('title', 'Edit Report')

@section('content')
    <div class="container mt-4">
        <h2>Create a New Report</h2>
        <form method="POST" action="{{ route('editreport', ['id' => $data ->id ])}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="reporttitle" class="form-label">Report Title</label>
                    <input type="text" class="form-control" id="reporttitle" name="Report_Title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="Description" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="Image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
