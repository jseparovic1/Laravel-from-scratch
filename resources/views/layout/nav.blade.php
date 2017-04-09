<div class="blog-masthead">
    <div class="container">
    <nav class="nav blog-nav">
        <a class="nav-link active" href="{{ route('home') }}">Home</a>

        @if(Auth::check())
            <a class="nav-link" href="{{ route('newPost') }}">Create new post</a>
        @endif

        <div class="nav-right">
            @if( Auth::check() )
                <a class="link-right" >{{ Auth::user()->name }}</a>
                <a class="link-right" href="{{ route('logout') }}">Log out</a>
            @else
                <a class="link-right" href="{{ route('login') }}">Sing in</a>
            @endif
        </div>

    </nav>
    </div>
</div>
