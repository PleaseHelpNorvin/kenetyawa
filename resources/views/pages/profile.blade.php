@extends('layouts.index')
@section('content')
    {{-- <h1>Profile</h1> --}}
    {{-- <div class="container"> --}}
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h1>Profile</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1">name</label>
                <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
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