<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Controllers\FileController;
use App\Mail\ConfirmOrder;


Route::prefix('')->middleware(\App\Http\Middleware\LocaleMiddleware::class)->group(function () {
    Route::get('/', function (\Illuminate\Http\Request $request) {
        //$locale = $request->get('locale') ?? session('locale', 'en');
        //session()->put(['locale' => $locale]);
        //\Illuminate\Support\Facades\App::setLocale($locale);
        return view('home');
    });

    Route::get('/about-page', function () {
        //$locale = session('locale', 'en');
        //\Illuminate\Support\Facades\App::setLocale($locale);
        return view('about');
    });
});
