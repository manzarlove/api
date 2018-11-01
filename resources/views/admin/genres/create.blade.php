@extends('layouts.app')
@section('content')
<form action="{{ route('genre.store') }}" method="post" >
	@csrf
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" >
    <p class="text-danger">{{ $errors->first('name') }}</p>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection