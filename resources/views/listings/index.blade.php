@extends('components/layout')
@section('content')
<a href="{{'/listings/create'}}"><button class="btn btn-primary m-3">Create List</button></a>
<h1>Lists</h1>
@if (count($listings)==0)
    <p>No results found</p>
    
@else

<table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($listings as $listing)
        <tr>
            <th scope="row">#</th>
            <td>{{$listing['title']}}</td>
            <td>{{$listing['description']}}</td>
            <td><img class="hidden w-48 mr-6 md:block"
              src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="no image" width="150px" height="150px" /></td>
              <td><?php if($listing->status==0) echo 'Not Completed'; else echo 'completed';?></td>
            <td><a href="/listings/{{$listing['id']}}/edit">Edit</a></td>
            <td> <form method="POST" action="/listings/{{$listing->id}}">
              @csrf
              @method('DELETE')
              <button onclick="return confirm('Are you sure you want to delete this item?');" class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form></td>
          </tr>
      @endforeach
    </tbody>
  </table>

    
@endif

@endsection