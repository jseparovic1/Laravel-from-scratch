@extends('layout.master')

@section('content')
    <h1>Create new post</h1>

    <form method="POST" action="/posts">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="Title">Title:</label>
            <input type="text" class="form-control" id="post-title" name="title" placeholder="Enter title here">
        </div>

        <div class="form-group">
            <label for="Blog text">Body:</label>
            <textarea class="form-control" id="post-body" name="body" placeholder="Enter text" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>

        @include('layout.errors')
    </form>
@endsection