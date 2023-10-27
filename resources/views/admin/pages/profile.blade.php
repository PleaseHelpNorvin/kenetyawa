@extends('admin.layouts.index')
@section('title', 'Profile')

@section('content')

    {{-- <h1>Profile</h1> --}}
    {{-- <div class="container"> --}}
        <form action="{{ route('edit.profile')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @if (session('message'))
                <span class="text-success">{{ session('message') }}</span>
            @endif
            <h1>Profile</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1">name</label>
                <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$user -> name}}" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user -> email}}" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Image</label>
                <input type="file" class="form-control" id="exampleFormControlInput1" name="image"   placeholder="Upload an image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    {{-- </div> --}}
@endsection