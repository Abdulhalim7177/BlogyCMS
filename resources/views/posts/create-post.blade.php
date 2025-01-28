<div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Leave a comment</h3>
    <!-- Add method attribute to specify the HTTP method for form submission -->
    <form action="{{ route('comment.store') }}" method="POST" class="p-5 bg-light">
      @csrf
      <div class="form-group">
        <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{ $single->id }}">
      </div>
      <div class="form-group">
        <label for="message">Comment</label>
        <textarea name="comment" placeholder ="Comment" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Post Comment" class="btn btn-primary">
      </div>

    </form>
  </div>