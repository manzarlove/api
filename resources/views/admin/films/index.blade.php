@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Genre</th>
        <th>Country</th>
        <th>Rating</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($films as $count=>$film)
      <tr>
        <td>{{ $count+1 }}</td>
        <td>{{ $film->name }}</td>
        <td>{{ $film->description }}</td>
        <td>@foreach($film->genres as $genre){{ $genre->name }}, @endforeach</td>
        <td>{{ $film->country->name }}</td>
        <td>{{ $film->rating }}</td>
        <td><a href="{{ route('admin.films.edit', $film->id) }}" class="btn btn-success">Edit</a></td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection