<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/profile',[UserController::class,'profile']);
Route::get('/change-password',[UserController::class,'changePassword']);
Route::get('/update-profile',[UserController::class,'updateProfile'])->name('user.update-profile');

Route::get('/home', function () {
    return view('home');
});
