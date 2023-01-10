<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function gallery()
    {
        if (request()->isMethod('post')) {
            //upload file
            $file = request()->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('photos', $fileName, 'public');
            //save to database
            $photo = new Photo();
            $photo->path = 'storage/photos/' . $fileName;
            $photo->save();
        }

        $photos = Photo::all();
        return view('gallery', compact('photos'));
    }
}
