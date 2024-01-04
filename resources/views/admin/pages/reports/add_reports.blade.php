@extends('admin.layouts.index')
@section('title', 'Create Report')

@section('content')
    <div class="container mt-0">
        <h2>Create a New Report</h2>
        <form method="POST" action="{{ route('addreport')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <label for="reporttitle" class="form-label">Report Title</label>
                <input type="text" class="form-control" id="reporttitle" name="Report_Title">
                    @if ($errors->has('Report_Title'))
                        <span class="text-danger">{{ $errors->first('Report_Title') }}</span>
                    @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="Description" rows="4"></textarea>
                    @if ($errors->has('Description'))
                        <span class="text-danger">{{ $errors->first('Description') }}</span>
                    @endif
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="Image">
                    @if ($errors->has('Image'))
                        <span class="text-danger">{{ $errors->first('Image') }}</span>
                    @endif
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
        </form>
    </div>
@endsection
