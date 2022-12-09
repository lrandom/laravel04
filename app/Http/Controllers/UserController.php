<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function profile()
    {
        return view('profile');
    }

    public function changePassword()
    {
        echo "this is change password page";
    }

    public function updateProfile(\Illuminate\Http\Request $request)
    {
        //xem mảng hoặc đối tượng
        //dd($request->all());
        $request->validate([
            'full_name' => 'required|min:5|max:50',
            'user_name' => 'required|min:5|max:50',
            'address' => 'required|min:5|max:50',
        ],[
            'full_name.required' => 'Full name is required',
            'full_name.min' => 'Full name must be at least 5 characters',
            'full_name.max' => 'Full name must be at most 50 characters',
            'user_name.required' => 'User name is required',
            'user_name.min' => 'User name must be at least 5 characters',
            'user_name.max' => 'User name must be at most 50 characters',
            'address.required' => 'Address is required',
            'address.min' => 'Address must be at least 5 characters',
            'address.max' => 'Address must be at most 50 characters',
        ]);


        if ($request->has(['user_name', 'full_name', 'address'])) {
            echo $request->full_name;
            echo $request->user_name;
            echo $request->address;
        }
    }
}
