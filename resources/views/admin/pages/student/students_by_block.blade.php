@extends('admin.layouts.index')

@section('title', 'Students by Block')
@section('content')
    <form action="">
        <button type="submit" class="btn btn-primary">Add Block</button>
    </form>
    <br><a href="{{ route('studentview') }}" class="btn btn-primary">Back</a>
    <br><br>
   
@endsection
