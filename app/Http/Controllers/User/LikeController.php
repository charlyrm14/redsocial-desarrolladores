<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function store ( Request $request, Post $post )
    {
        $post->likes()->create( [
            'user_id' => $request->user()->id,
        ] );

        return back();
    }

    public function destroy ( Request $request, Post $post )
    {
        $request->user()->likes()->where( 'post_id', $post->id )->delete();

        return back();
    }
}
