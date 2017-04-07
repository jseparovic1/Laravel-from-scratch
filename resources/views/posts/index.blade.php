@extends('layout.master')

@section('title')
    Virtualnoob | Latest news
@endsection

@section('description', 'Posts website, get fresh news from tech all day and night')

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
                    {{ $post->created_at->toFormattedDateString() }}
                </p>
                <p> {{$post->body}} </p>
            </div><!-- /.blog-post -->
        </div>
    @endforeach
@endsection

