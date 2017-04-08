<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
   public function store($id, Request $request)
   {
       $this->validate($request, ["body" => "required|min:2"]);

       //find post and save comment
       $post = Post::findOrFail($id);
       $post->comments()->create(['body' => request('body')]);

       return back();
   }
}
