<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function uploadUI()
    {
        return view('upload');
    }

    public function upload()
    {
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            //$file->store('images', 'public');
            $file->storeAs('images', time().'.'.$file->getClientOriginalExtension(), 'public');
        }
    }
}
