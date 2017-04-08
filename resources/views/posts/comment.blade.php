<div class="form-group">
    <div class="list-group">
        @foreach($post->comments as $comment)
            <li class="list-group-item">
                {{ $comment->body }}
                <i class="pull-right">{{ $comment->created_at->diffForHumans() }}</i>
            </li>
        @endforeach
    </div>
    {{--display errors--}}
    @include('layout.errors')
</div>