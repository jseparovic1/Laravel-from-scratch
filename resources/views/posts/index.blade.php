@extends('layout.master')

@section('title')
    {{ $posts[0]->title }}
@endsection

@section('description', 'Posts website, get fresh news from tech all day and night')

@section('content')
    @foreach($posts as $post)
        @component('posts.post')
            @slot('title')
                {{$post->title}}
            @endslot
            {{$post->postText}}}
        @endcomponent
    @endforeach
@endsection