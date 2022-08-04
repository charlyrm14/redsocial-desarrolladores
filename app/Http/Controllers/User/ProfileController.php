<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdateProfileRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth');  
    }

    public function index ()
    {
        return view('profile/index');
    }

    public function store ( UpdateProfileRequest $request )
    {

        if ( $request->hasFile('image') ) {
            $storedImage = $this->storeProfileImage ( $request->file('image') );
        }
        
        $user                   = User::find( auth()->user()->id );
        $user->username         = $request->username;
        $user->profile_picture  = $storedImage ?? auth()->user()->profile_picture ?? null;
        //dd($user->profile_picture);
        $user->update();

        return redirect()->route('post.index', $user->username);

    }

    public function storeProfileImage ( $imageRequest )
    {
        $image      = $imageRequest;
        $imageName  = Str::uuid() . '.' . $image->extension();

        $serverImage = Image::make( $image );
        $serverImage->fit( 1000, 1000);

        $date       = Carbon::now();
    	$dir        = $date->format('F') . $date->format('Y') . '/' . $date->format('d');

        // Put file with own name
        Storage::put( $imageName, $serverImage->save() );

        // Move file to your publica path 
        Storage::move( $imageName, $dir . '/' . $imageName );

        return  $dir . '/' . $imageName;

    }
}
