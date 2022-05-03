@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Create New Album</h1>

    <form action="{{ route('photos-store', $albumId) }}" method="post" enctype="multipart/form-data" >
      @csrf
      <input type="hidden" name="album-id" value="{{ $albumId }}">
      <div class="form-group mb-2">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{old('title')}}">
      </div>
      <div class="form-group mb-2">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" value="{{old('description')}}">
      </div>
      <div class="form-group mb-2">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" name="photo" id="photo" placeholder="Enter Photo" >
      </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
  </div>
@endsection