<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Jurica Šeparović">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">

</head>

<body>

@include('layout.header')

<div class="jumbotron">
    @section('featured')
            <h1> Pršuting is awsome</h1>
    @show
</div>



<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>



@include('layout.footer')

</body>
</html>
