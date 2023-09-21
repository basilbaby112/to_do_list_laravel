@extends('components/layout')
@section('content')
<h2 class="mb-5">Edit List</h2>
<form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
      <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$listing->title}}" placeholder="Task Name">
    </div>
    @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1">Task Description</label>
        <textarea class="form-control" name="description" value="" id="exampleFormControlTextarea1" rows="3">{{$listing->description}}</textarea>
    </div>
    @error('description')
        <p class="text-red-500">{{$message}}</p>
    @enderror
    <select class="form-select m-3" name="status" aria-label="Default select example">
        <option value="0" {{ $listing->status == 0 ? 'selected' : '' }}>Not completed</option>
        <option value="1" {{ $listing->status == 1 ? 'selected' : '' }}>Completed</option>
      </select>
    <div class="input-group mb-3">
        <label class="custom-file-label" for="inputGroupFile01">Upload Image</label>
        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
        <img class="w-48 mr-6 mb-6"
          src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" width="150px" height="150px" />
    </div>
    @error('image')
        <p class="text-red-500">{{$message}}</p>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
