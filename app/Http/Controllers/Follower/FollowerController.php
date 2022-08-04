<?php

namespace App\Http\Controllers\Follower;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FollowerController extends Controller
{

    public function store ( User $user )
    {
        /* 
            Crea registro en tabla pivote followers 
            Cuando el usuario autenticado empieza a seguir a otro usuario
        */
        $user->followers()->attach( auth()->user()->id );

        return back();
    }

    public function destroy ( User $user )
    {
        /* 
            Elimina registro en tabla pivote followers 
            Cuando el usuario autenticado deja de seguir a otro usuario
        */
        $user->followers()->detach( auth()->user()->id );

        return back();
    }
}
