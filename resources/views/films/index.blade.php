@extends('layouts.app')
@section('content')
@foreach($films->chunk(3) as $chunk)
<div class="row">
	@foreach($chunk as $film)
	<div class="col-md-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('storage/films/'.$film->photo) }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $film->name }}</h5>
    <h5 class="card-title">Price:{{ $film->price }}</h5>
    <p class="card-text">{{ str_limit($film->description, 100) }}</p>
    <a href="{{ route('film.show', $film->slug) }}" class="btn btn-primary">Read More..</a>
  </div>
</div>
</div>
@endforeach
</div>
@endforeach
@endsection