@extends('layouts.app')

@section('content')
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ $albums->name }}</h1>
        <p class="lead text-muted">{{ $albums->description }}</p>
        <p>
          <a href="{{ route('photos-create', $albums->id )}}" class="btn btn-primary my-2">Upload Photo</a>
          <a href="/albums" class="btn btn-secondary my-2">Go Back</a>
        </p>
      </div>
    </div>
  </section>

  <div class="container">
    @if( count($albums->photos) > 0 )
      <div class="row">
        @foreach( $albums->photos as $photo )
          <div class="col-md-4">
            <div class="card mb-2 shadow-sm">
              <img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->photo}}" height="200px">
              <div class="card-body">
                <div class="card-text">
                  <p>{{$photo->description}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="{{route('photos-show', $photo->id)}}" type="button" class="btn btn-outline-primary" >View</a>
                    <small class="text-muted">{{$photo->title}}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <h3>There is no photo yet.</h3>
    @endif
  </div>
@endsection
