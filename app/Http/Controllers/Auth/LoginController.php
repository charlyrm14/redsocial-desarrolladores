<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;


class LoginController extends Controller
{
    public function index ()
    {
        return view('auth/login');
    }

    public function store ( LoginRequest $request )
    {

        if ( !auth()->attempt( $request->only('email', 'password'), $request->remember ) ) {
            return back()->with('wrongData', 'Datos incorrectos');
        }

        return redirect()->route('post.index', auth()->user()->username );
    }
}
