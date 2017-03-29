<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Jurica Šeparovic">

    <title>@yield('title')</title>

    @include('layout.styles')
</head>
<body>

<div class="blog-masthead">
    <div class="container">
        @include('layout.nav')
    </div>
</div>

<div class="blog-header">
    <div class="container">
        @include('layout.header')
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            @yield('content')
        </div>
        <div class="col-sm-3 offset-sm-1 blog-sidebar">
            @include('sidebar.index')
        </div>
    </div>
</div>

@include('layout.footer')

</body>
</html>
