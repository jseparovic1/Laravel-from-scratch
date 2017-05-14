<h4>Tags</h4>
<ol class="list-unstyled">
    @foreach($tags as $tag)
        <li>
            <a href="/posts/tag/{{ $tag }}">
                {{ $tag }}
            </a>
        </li>
    @endforeach
</ol>
