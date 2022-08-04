<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class SignUpController extends Controller
{
    public function index () 
    {
        return view('auth/signup');
    }

    public function store ( SignUpRequest $request ) 
    {
        
        $formRequest                = $request->all();
        $formRequest['username']    = $request->username;
        $formRequest['password']    = Hash::make( $request->password );

        $user = User::create( $formRequest );

        /* Autenticar usuario */
        auth()->attempt( $request->only('email', 'password') );

        return redirect()->route('post.index', $user);

    }
}
