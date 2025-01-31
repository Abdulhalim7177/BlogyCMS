@extends('layouts.app')

@section('content')

<div class="container">
   
    <div class="comment-form-wrap pt-5">
        <h3 class="mb-5">Update Post</h3>
        <!-- Add method attribute to specify the HTTP method for form submission -->
        <form action="{{route('post.update', $single->id)}}" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="message">Title </label>
            <input type="text" value="{{$single->title}}" class="form-control" name="title"  placeholder="Title">
          </div>
          <div class="form-group">
            <select name="category"  class="form-select" aria-label="Default select example">
                <option selected>Categories</option>
                @foreach ($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="message">Description</label>
            <textarea name="description" placeholder ="Description" cols="30" rows="10" class="form-control">{{$single->description}}</textarea>
          </div>
            <div class="form-group">
                <label for="message">Image</label>
                <input type="file" class="form-control" name="image" value="{{$single->image}}"  placeholder="Image">
            </div>
          <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary">
          </div>
    
        </form>
      </div>
</div>
@endsection


