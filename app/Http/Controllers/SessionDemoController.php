<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionDemoController extends Controller
{
    //
    public function setSession()
    {
        session(['name' => 'Laravel']);
        return view('setSession');
    }

    public function getSession()
    {
        return view('getSession', ['name' => session('name')]);
    }
}
