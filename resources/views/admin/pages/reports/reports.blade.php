@extends('admin.layouts.index')
@section('title', 'Profile')

@section('content')
    <div class="container mt-0">
        <h2>Reports</h2>
        <div class="row">
            @forelse ($data as $report)
                <div class="col-md-4 mb-4">
                    <div class="card {{ $report->status == 'Active' ? 'bg-danger' : 'bg-success' }}" style="width: 18rem;">
                        <img src="{{ asset('images/reports/' . $report->image) }}" class="card-img-top" alt="{{ $report->reporttitle }}" style="max-width: 100%; height: auto;">
                        <div class="card-body">
                            <p class="text-dark">ID= {{$report->id}}</p>
                            <h5 class="card-title text-dark">{{ $report->reporttitle }}</h5>
                            <p class="card-text text-dark">{{ $report->description }}</p>
                            <form action="{{ route('updatestatus', $report->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger">Mark as Done</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p class="text-dark">No reports available.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
