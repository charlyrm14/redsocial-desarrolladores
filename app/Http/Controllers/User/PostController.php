<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Support\Facades\File; 
use App\Polices\User\PostPolicy;   


class PostController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth')->except( [ 'show' ] );
    }

    public function index ( User $user ) 
    {

        $posts = Post::where( 'user_id', $user->id )->latest()->paginate( 32 );

        return view('user/dashboard', [
            'user'  => $user,
            'posts' => $posts
        ]);
    }

    public function create ()
    {
        return view('posts/create');
    }

    public function store ( StorePostRequest $request )
    {
        // Crea un nuevo post
        $request->user()->posts()->create( $request->all() );

        return redirect()->route('post.index', auth()->user()->username );
    }

    public function show ( User $user, Post $post )
    {
        return view('posts/show', [
            'user' => $user,
            'post' => $post
        ]);
    }

    public function destroy ( Post $post )
    {
        /* 
            Comprueba si el usuario autenticado es el mismo que va a eliminar su propio post, a través
            de PostPolicy
        */
        $this->authorize('delete', $post);
        $post->delete();

        // Elimina imagen
        $imagePath = public_path('uploads/' . $post->image );

        if ( File::exists( $imagePath ) ) {
            unlink( $imagePath );
        }

        return redirect()->route('post.index', auth()->user()->username );
    }
}
