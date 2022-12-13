<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;

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

Route::get('/profile', [UserController::class, 'profile']);
Route::get('/change-password', [UserController::class, 'changePassword']);
Route::get('/update-profile', [UserController::class, 'updateProfile'])->name('user.update-profile');

Route::get('/home', function () {
    return view('home');
});

Route::get('/get-migrations', function () {
    $migrationsData = DB::table('migrations')->get();
    //dd($migrationsData);
    foreach ($migrationsData as $migration) {
        echo $migration->batch;
        echo "<br>";
    }
});


Route::get('/user', function () {
    //$user = DB::table('users')->where('email', 'gia.gleichner@example.com')->get();
    //$user = DB::table('users')->where('id','>',6)->where('id','<',9)->get();//SELECT * FROM users WHERE id>6 AND id<9
    //$user = DB::table('users')->where('id','>',6)->orWhere('id','<',9)->get();//SELECT * FROM users WHERE id>6 OR id<9
    /*$user = DB::table('users')->where('id',6)->orWhere(function($query){
        $query->where('id','>',5)->where('id','<',9);
    })->first();//SELECT * FROM users WHERE id=6 OR (id>5 AND id<9);
    //echo DB::table('users')->toSql();*/
    //$max = DB::table('users')->min('id');
    //$listUser = DB::table('users')->get();//SELECt * FROM users
    //$listUser = DB::table('users')->select('id,email')->get();//SELECt id,email FROM users
//    $listUser = DB::table('users')->leftJoin('posts','users.id','=','posts.user_id')
//        ->select('users.*','posts.id as post_id')->get();
//    dd($listUser);
});

Route::get('/insert-user', function () {
    DB::table('users')->insert([
        'name' => 'Lrandom',
        'email' => 'a@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make("lrandom"),
    ]);
});
