@extends('layouts.app')

@section('content')

<div class="container">
    <div class="comment-form-wrap pt-5">
        <h3 class="mb-5">Create New Post</h3>
        <!-- Add method attribute to specify the HTTP method for form submission -->
        <form action="" method="POST" class="p-5 bg-light">
          @csrf
          <div class="form-group">
            <label for="message">Title </label>
            <input type="text" class="form-control" name="title"  placeholder="Title">
          </div>
          <div class="form-group">
            <select name="categories"  class="form-select" aria-label="Default select example">
                <option selected>Categories</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="user_id"  placeholder="Title">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="user_name"  placeholder="Title">
          </div>
          <div class="form-group">
            <label for="message">Description</label>
            <textarea name="comment" placeholder ="Description" cols="30" rows="10" class="form-control"></textarea>
          </div>
            <div class="form-group">
                <label for="message">Image</label>
                <input type="file" class="form-control" name="image"  placeholder="Image">
            </div>
          <div class="form-group">
            <input type="submit" value="Post Comment" class="btn btn-primary">
          </div>
    
        </form>
      </div>
</div>
@endsection


