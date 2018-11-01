@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif
<form action="{{ route('admin.films.update', $film->id) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" value="{{ $film->name }}" placeholder="Name" >
    <p class="text-danger">{{ $errors->first('name') }}</p>
  </div>
  
  <div class="form-group">
    <label for="name">Description:</label>
    <textarea name="description" placeholder="Enter Description" class="form-control"> {{ $film->description }}</textarea>
    <p class="text-danger">{{ $errors->first('description') }}</p>
  </div>

  <div class="form-group">
    <label for="name">Date:</label>
    <input type="date" name="realease_date" class="form-control" value="{{ $film->release_date }}">
    <p class="text-danger">{{ $errors->first('realease_date') }}</p>
  </div>

	<div class="form-group">
    <label for="name">Rating:</label>
    <select class="form-control" name="rating">
    	<option value="0">--Select Rating--</option>
    	
    	<option value="1" @if($film->rating==1) {{ 'selected' }} @endif>1</option>
    	<option value="2" @if($film->rating==2) {{ 'selected' }} @endif>2</option>
    	<option value="3" @if($film->rating==3) {{ 'selected' }} @endif>3</option>
    	<option value="4" @if($film->rating==4) {{ 'selected' }} @endif>4</option>
    	<option value="5" @if($film->rating==5) {{ 'selected' }} @endif>5</option>
    	
    </select>
    <p class="text-danger">{{ $errors->first('country') }}</p>
  </div>
	
  <div class="form-group">
    <label for="name">Price:</label>
    <input type="text" name="price" placeholder="Price" class="form-control" value="{{ $film->price }}">
    <p class="text-danger">{{ $errors->first('price') }}</p>
  </div>
	
  <div class="form-group">
    <label for="name">Country:</label>
    <select class="form-control" name="country">
    	<option value="0">--Select Country--</option>
    	@foreach($countries as $country)
    	<option value="{{ $country->id }}" @if($country->id == $film->country_id) {{ 'selected' }} @endif>{{ $country->name }}</option>
    	@endforeach
    </select>
    <p class="text-danger">{{ $errors->first('country') }}</p>
  </div>

  <div class="form-group">
    <label for="name">Genre:</label>
    <select class="form-control" name="genre">
    	<option value="0">--Select Genre--</option>
    	@foreach($genres as $genre)
    	<option value="{{ $genre->id }}" @if($genre->id == $film->genre_id ) {{ 'selected' }} @endif>{{ $genre->name }}</option>
    	@endforeach
    </select>
    <p class="text-danger">{{ $errors->first('genre') }}</p>
  </div>
  
  <div class="form-group">
    <label for="name">Image:</label>
    <input type="file" name="image" >
    <p class="text-danger">{{ $errors->first('image') }}</p>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection