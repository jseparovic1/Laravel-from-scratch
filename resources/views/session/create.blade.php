@extends('layout.master')

@section('blog-title', 'Sing in')

@section('content')
    <form method="POST" action="/login">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="login-email" name="email" placeholder="Enter email here">
        </div>

        <div class="form-group">
            <label for="Blog text">Password:</label>
            <input type="password" class="form-control" id="post-body" name="password" placeholder="Your password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Log in</button>
        </div>

        <div class="form-group">
            <div class="row">Or <a href="{{ route('register') }}" style="margin-left: 5px">  Register here</a></div>
        </div>
        @include('layout.errors')
    </form>
@endsection