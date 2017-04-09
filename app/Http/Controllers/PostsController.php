<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    /**
     * Show latest posts
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

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
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|min:5',
            'body' => 'required'
        ]);

        //auth()->user()-publish(post)

        //ensure that title and body are columns in your database for Post
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'slug' => str_slug($request->input('title')),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/');
    }
}
