<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\Post\StoreCommentRequest;

class CommentController extends Controller
{
    public function store ( StoreCommentRequest $request, User $user, Post $post )
    {
        $form               = $request->all();
        $form['user_id']    = auth()->user()->id;
        $form['post_id']    = $post->id;

        $comment = Comment::create( $form );
        
        return back()->with('_success', 'Comentario publicado con éxito');

    }
}
