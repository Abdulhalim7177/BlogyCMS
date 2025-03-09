@extends('layouts.app')

@section('content')

<div class="container">
   
    <div class="comment-form-wrap pt-5">
        <h3 class="mb-5">Update Profile</h3>
        <!-- Add method attribute to specify the HTTP method for form submission -->
        <form action="{{route('users.update', $user->id)}}" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="message">Email </label>
            <input type="text" value="{{$user->email}}" class="form-control" name="email"  placeholder="email">
          </div>
          <div class="form-group">
            <label for="message">Name </label>
            <input type="text" value="{{$user->name}}" class="form-control" name="name"  placeholder="name">
          </div>
          <div class="form-group">
            <label for="message">Bio</label>
            <textarea name="bio" placeholder ="bio" cols="30" rows="10" class="form-control">{{$user->bio}}</textarea>
          </div>
            <div class="form-group">
                <label for="message">Image</label>
                <input type="file" class="form-control" name="image" value="{{$user->image}}"  placeholder="Image">
            </div>
          <div class="form-group">
            <input type="submit" value="Update Profile" class="btn btn-primary">
          </div>
    
        </form>
      </div>
</div>
@endsection


