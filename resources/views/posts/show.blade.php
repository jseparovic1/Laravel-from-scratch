@extends('layout.master')

@section('description', $post->title)
@section('blog-title', 'Awesome post')

{{--Show signle post--}}
@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">
                {{ $post->title }}
            </h2>
            <p class="tags">
               @foreach ($post->tags as $tag)
                    <a href="/posts/tag/{{ $tag->name }}"> {{ $tag->name  }}</a>
               @endforeach
            </p>
            <p class="blog-post-meta">
                <i> {{ ucwords($post->user->name) }} </i> at
                {{ $post->created_at->toFormattedDateString() }}
            </p>
            <p> {{ $post->body }} </p>
            <hr>
        </div><!-- /.blog-post -->

        @include('posts.comment')

        {{--Allow user to comment if he is logged in--}}
        @if(Auth::check())
            @include('posts.commentForm')
        @endif

    </div>
@endsection
