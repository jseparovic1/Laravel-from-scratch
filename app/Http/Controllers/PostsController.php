<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Post;

class PostsController extends Controller
{
    /**
     * Show latest posts
     */
    public function index()
    {
        $posts = Post::latest()->filter(request(['year','month']))->get();

        return view('posts.index', compact('posts', 'archives'));
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

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        return redirect('/');
    }
}
