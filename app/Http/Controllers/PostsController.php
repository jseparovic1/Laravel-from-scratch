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
        $posts = Post::latest()->get();

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
     * Show single post by slug
     * This method use Route model binding
     */
    public function showSlug(Post $post)
    {
        return view('posts.showSlug', compact('post'));
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

        //ensure that title and body are columns in your database for Post
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'slug' => str_slug($request->input('title'))
        ]);

        return redirect('/');
    }
}
