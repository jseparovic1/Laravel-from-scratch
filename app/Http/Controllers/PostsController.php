<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * PostsController constructor.
     */
    public function __construct()
    {

    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
}