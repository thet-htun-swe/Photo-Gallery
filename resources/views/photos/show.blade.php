@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>{{$photos->title}}</h3>
    <p>{{$photos->description}}</p>
    <form action="{{route('photos-delete', $photos->id)}}" method="post">
      @csrf 
      @method('DELETE')
      <button type="submit" name="button" class="btn btn-danger float-end">Delete</button>
    </form>

    <a href="{{route('albums-show', $photos->album_id)}}" type="button" class="btn btn-primary">Go back</a>
    
    <small class="text-muted">{{$photos->size}}</small>

    <hr>
    <img src="/storage/albums/{{$photos->album_id}}/{{$photos->photo}}" alt="{{$photos->photo}}" height="500px">
  </div>
@endsection