<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lien-he-voi-chung-toi', function () {
    return view('about');
});

Route::get('/tin-tuc', function () {
    echo "Bạn đã vào phần tin tức";
    return view('about');
});

/*Route::get('/admin/user', function () {
    echo "Đây là trang qly user";
});
Route::get('/admin/post', function () {
    echo "Đây là trang qly post";
});*/

Route::prefix('/admin')->group(function () {
    Route::get('/user', function () {

    });
    Route::get('/post', function () {

    });
});

Route::get('/posts/{id}/{name}', function ($id, $name) {
    echo $id;
    echo $name;
})->name('post.id.name');


Route::get('/profile', function () {
    $names = [
        'Nguyễn Văn A',
        'Nguyễn Văn B',
    ];
    $age = 20;
    return view('user.profile', compact('names', 'age'));
});

Route::get('/demo', function () {
    $names = [
        'Nguyễn Văn A',
        'Nguyễn Văn B',
    ];
    return view('demo',compact('names'));
});
