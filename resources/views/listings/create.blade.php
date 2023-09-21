@extends('components/layout')
@section('content')
<h2 class="mb-5">Create List</h2>
<form method="POST" action="/listings" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
      <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('title')}}" placeholder="List Name">
    </div>
    @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1">List Description</label>
        <textarea class="form-control" name="description" value="{{old('description')}}" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    @error('description')
        <p class="text-red-500">{{$message}}</p>
    @enderror
    <div class="input-group mb-3">
        <label class="custom-file-label" for="inputGroupFile01">Upload Image</label>
        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
    </div>
    @error('image')
        <p class="text-red-500">{{$message}}</p>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
