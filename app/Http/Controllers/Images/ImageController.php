<?php

namespace App\Http\Controllers\Images;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store ( Request $request )
    {
        $image      = $request->file('file');
        $imageName  = Str::uuid() . '.' . $image->extension();

        $serverImage = Image::make( $image );
        $serverImage->fit( 1000, 1000);

        $date       = Carbon::now();
    	$dir        = $date->format('F') . $date->format('Y') . '/' . $date->format('d');

        // Put file with own name
        Storage::put( $imageName, $serverImage->save() );

        // Move file to your publica path 
        Storage::move( $imageName, $dir . '/' . $imageName );

        return response()->json( [ 'image' => $dir . '/' . $imageName ] );
    }
}
