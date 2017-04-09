<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">

    <title>@yield('title')</title>

    @include('layout.styles')
</head>
<body>

@include('layout.nav')

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">
            @yield('blog-title')
        </h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 blog-main">
            @yield('content')
        </div>

        @include('sidebar.index')
    </div>
</div>

@include('layout.footer')

</body>
</html>
