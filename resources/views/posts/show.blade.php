@extends('layout.master')

@section('title')
    {{ $post->title }}
@endsection

@section('description')
    {{ $post->title }}
@endsection

{{--Show signle post--}}
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
            <hr>
            @include('posts.comment')
            @include('posts.commentForm')
        </div><!-- /.blog-post -->
    </div>
@endsection
