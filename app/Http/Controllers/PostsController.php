<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Repositories\Posts;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use App\Post;

class PostsController extends Controller
{
    /**
     * Show latest posts
     */
    public function index(Posts $posts)
    {
        $posts = $posts->all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show single post by id
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Render post creation form
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     *  Store post
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|max:255|min:5',
            'body' => 'required'
        ]);

        $post = new Post(request(['title', 'body']));

        auth()->user()->publish($post);

        //dispatch post created event
        Event::dispatch(new PostCreated($post));

        return redirect()->route('home');
    }
}
