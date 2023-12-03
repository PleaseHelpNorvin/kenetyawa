@extends('admin.layouts.index')
@section('title', 'Profile')

@section('content')
    <div class="container1 mt-4">
        <h2>Reports with Bootstrap Cards</h2>
        <div class="row">
            @forelse ($data as $report)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/reports/' . $report->image) }}" class="card-img-top" alt="{{ $report->reporttitle }}">
                        <div class="card-body">
                            <p>ID= {{$report->id}}</p>
                            <h5 class="card-title">{{ $report->reporttitle }}</h5>
                            <p class="card-text">{{ $report->description }}</p>

                            <form action="{{ route('deletereport', $report->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('editreportpage', ['id' => $report->id]) }}" class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No reports available.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
