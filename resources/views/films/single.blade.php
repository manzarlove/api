@extends('layouts.app')
@section('content')
<div class="row">
		
<div class="card">
  <img class="card-img-top" src="{{ asset('storage/films/'.$film->photo) }}" style="width: 500px;" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $film->name }}</h5>
    <h5 class="card-title">Price{{ $film->price }}</h5>
    <h5 class="card-title">Genre:@foreach($film->genres as $genre) {{ $genre->name }}, @endforeach</h5>
    <h5 class="card-title">Country:@foreach($film->genres as $genre) {{ $genre->name }}, @endforeach</h5>
    <p class="card-text">Description:{{ $film->description }}</p>
  </div>
</div>

</div>
@endsection 