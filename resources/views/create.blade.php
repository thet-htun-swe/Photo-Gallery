@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Create New Album</h1>

    <form action="{{ route('albums-store') }}" method="post" enctype="multipart/form-data" >
      @csrf
      <div class="form-group mb-2">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
      </div>
      <div class="form-group mb-2">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" value="{{old('description')}}">
      </div>
      <div class="form-group mb-2">
        <label for="cover-image">Cover Image</label>
        <input type="file" class="form-control" name="cover-image" id="cover-image" placeholder="Enter Cover Image" >
      </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
  </div>
@endsection