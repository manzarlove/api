@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($countries as $count=>$country)
      <tr>
        <td>{{ $count+1 }}</td>
        <td>{{ $country->name }}</td>
        <td><a href="" class="btn btn-success">Edit</a>| <a href="" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection