@extends('layout')
@section('content')
    
<h1>Tasks</h1>
@if (count($listings)==0)
    <p>No results found</p>
    
@else

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($listings as $listing)
      <tr>
        <th scope="row">1</th>
        <td><a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a></td>
        <td>{{$listing['description']}}</td>
        <td><a href="/listings/{{$listing['id']}}">View</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

    
@endif

@endsection