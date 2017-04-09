<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
   public function store($id, Request $request)
   {
       //validate request
       $this->validate($request, ["body" => "required|min:2"]);

       //find post and save comment
       $post = Post::findOrFail($id);
       $post->addComment($request->get('body'));

       $request->session()->flash('status', 'Task was successful!');

       return redirect()->back();
   }
}
