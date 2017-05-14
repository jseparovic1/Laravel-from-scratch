<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Use column named name for route model biding
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function index(Tag $tag = null)
    {
        $posts = $tag->posts()->get();

        return view('posts.index', compact('posts'));
    }
}
