@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif
<form action="{{ route('admin.films.store') }}" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" >
    <p class="text-danger">{{ $errors->first('name') }}</p>
  </div>
  
  <div class="form-group">
    <label for="name">Description:</label>
    <textarea name="description" placeholder="Enter Description" class="form-control"> {{ old('description') }}</textarea>
    <p class="text-danger">{{ $errors->first('description') }}</p>
  </div>

  <div class="form-group">
    <label for="name">Date:</label>
    <input type="date" name="realease_date" class="form-control" value="{{ old('realease_date') }}">
    <p class="text-danger">{{ $errors->first('realease_date') }}</p>
  </div>

	<div class="form-group">
    <label for="name">Rating:</label>
    <select class="form-control" name="rating">
    	<option value="0">--Select Rating--</option>
    	
    	<option value="1">1</option>
    	<option value="2">2</option>
    	<option value="3">3</option>
    	<option value="4">4</option>
    	<option value="5">5</option>
    	
    </select>
    <p class="text-danger">{{ $errors->first('country') }}</p>
  </div>
	
  <div class="form-group">
    <label for="name">Price:</label>
    <input type="text" name="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
    <p class="text-danger">{{ $errors->first('price') }}</p>
  </div>
	
  <div class="form-group">
    <label for="name">Country:</label>
    <select class="form-control" name="country">
    	<option value="0">--Select Country--</option>
    	@foreach($countries as $country)
    	<option value="{{ $country->id }}">{{ $country->name }}</option>
    	@endforeach
    </select>
    <p class="text-danger">{{ $errors->first('country') }}</p>
  </div>

  <div class="form-group">
    <label for="name">Genre:</label>
    <select class="form-control select2" id="select2" name="genre[]" multiple >
    	<option value="0">--Select Genre--</option>
    	@foreach($genres as $genre)
    	<option value="{{ $genre->id }}">{{ $genre->name }}</option>
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
@push('js')
 <script>
      $(function () {
        //Initialize Select2 Elements
        $('#select2').select2();
    });
</script>
@endpush