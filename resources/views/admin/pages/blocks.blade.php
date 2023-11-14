@extends('admin.layouts.index')

@section('title', 'Blocks')
@section('content')
    <form action="">
        <button type="submit" class="btn btn-primary">Add Block</button>
    </form>
    <br><a href="{{ route('studentview',['batchId' => 'null']) }}" class="btn btn-primary">Back</a>
    <br><br>
   
@endsection
