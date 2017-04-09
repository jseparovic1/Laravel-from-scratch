<div class="form-group">
    <div class="list-group">
        @foreach($post->comments as $comment)
            <li class="list-group-item">
                {{ $comment->body }}
                <div class="pull-right">
                    <i class="text-info"> by {{ $comment->author->name }}</i>
                    <i class="">{{ $comment->created_at->diffForHumans() }}</i>
                </div>
            </li>
        @endforeach
    </div>
    {{--display errors--}}
    @include('layout.errors')
</div>