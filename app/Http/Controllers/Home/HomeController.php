<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function __construct ()
    {   
        $this->middleware('auth');
    }

    public function __invoke ()
    {   
        $followingIds   = auth()->user()->followings->pluck('id')->toArray();

        /* Obtiene posts por usuarios que sigue el usuario autenticado */
        $posts          = Post::whereIn( 'user_id', $followingIds )->latest()->paginate( 40 ); 

        return view('home/index', [
            'posts' => $posts,
        ]);
    }
}
