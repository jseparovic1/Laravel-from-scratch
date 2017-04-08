<form method="post" action="/posts/{{ $post->id }}/comments">
    {{ csrf_field() }}
    <div class="form-group">
        <textarea class="form-control" type="text" name="body" placeholder="Enter your comment here" required></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit comment</button>
    </div>
</form>