@extends('layout.master')

@section('title','Virtualnoob | Latest news')
@section('blog-title', 'The blog')
@section('description', 'Posts website, get fresh news from tech all day and night')

{{--flash messages--}}
@include('layout.notice')

{{-- main post layout --}}
@section('content')
    @foreach($posts as $post)
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">
                    <a href="/posts/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="blog-post-meta">
                    <i> {{ ucwords($post->user->name) }} </i> at
                    {{ $post->created_at->toFormattedDateString() }}
                </p>
                <p> {{ $post->body }} </p>
                <hr>
                @include('posts.comment')
            </div><!-- /.blog-post -->
        </div>
    @endforeach
@endsection

