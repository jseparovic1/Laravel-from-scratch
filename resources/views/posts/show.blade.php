@extends('layout.master')

@section('title')
    {{ $post->title }}
@endsection

@section('description')
    {{ $post->title }}
@endsection

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">
                {{ $post->title }}
            </h2>
            <p class="blog-post-meta">
                {{ $post->created_at->toFormattedDateString() }}
            </p>
            <p> {{ $post->body }} </p>
        </div><!-- /.blog-post -->
    </div>
@endsection