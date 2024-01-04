@extends('admin.layouts.index')
@section('title', 'Edit Report')

@section('content')
    <div class="container mt-0">
        <h2>Edit a New Report</h2>
        <form method="POST" action="{{ route('editreport', ['id' => $data ->id ])}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            {{-- @foreach($data as $report) --}}
                <div class="mb-3">
                    <label for="reporttitle" class="form-label">Report Title</label>
                    <input type="text" class="form-control" id="reporttitle" name="Report_Title" value="{{ $data->reporttitle }}">
                    @if ($errors->has('Report_Title'))
                        <span class="text-danger">{{ $errors->first('Report_Title') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="Description" rows="4" >{{ $data->description }}</textarea>
                    @if ($errors->has('Description'))
                        <span class="text-danger">{{ $errors->first('Description') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="Image">
                    @if ($data->image)
                        <p>Previous File: {{ $data->image }}</p>
                    @endif
                    @if ($errors->has('Image'))
                        <span class="text-danger">{{ $errors->first('Image') }}</span>
                    @endif
                </div>
            {{-- @endforeach --}}
                <a href="{{ route('reportsview') }}" class="btn btn-secondary me-2"><i class="fa fa-window-close"></i></a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
        </form>
    </div>
@endsection
