@extends('layout.master')

@section('blog-title', 'Registration')

@section('content')
    <form method="POST" action="/register">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text"
                   class="form-control"
                   id="login-email"
                   name="name"
                   placeholder="Enter your name here">
        </div>

        <div class="form-group">
            <label for="Title">Email:</label>
            <input type="text"
                   class="form-control"
                   id="register-username"
                   name="email"
                   placeholder="Enter email here">
        </div>

        <div class="form-group">
            <label for="Blog text">Password:</label>
            <input type="password"
                   class="form-control"
                   id="post-body"
                   name="password"
                   placeholder="Your password"
            >
        </div>

        <div class="form-group">
            <label for="Blog text">Confirm password:</label>
            <input type="password"
                   class="form-control"
                   id="post-body"
                   name="password_confirmation"
                   placeholder="Your password"
            >
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        @include('layout.errors')
    </form>
@endsection