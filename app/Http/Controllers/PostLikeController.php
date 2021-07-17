<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post,Request $request)
    {
        if($post->likedBy($request->user())) {
            return back()->with('status','Already like the post.');
        }

        $post->likes()->create([
            'user_id'   =>  $request->user()->id
        ]);

        return back();
    }
}
