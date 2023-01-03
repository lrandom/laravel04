<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

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

require_once __DIR__ . '/be.php';

Route::get('/pagination', function (\Illuminate\Http\Request $request) {
    if ($request->q) {
        $posts = Post::where('title', 'like', '%' . $request->q . '%')->paginate(5);
    } else {
        $posts = Post::paginate(5);
    }
    $posts->appends(['q' => $request->q]);
    return view('pagination', ['posts' => $posts]);
});

Route::get('/user', function () {
    $user = \App\Models\User::find(3);
    echo $user->extra_infos->extra_address;
    echo $user->extra_infos->extra_phone;
});


Route::get('/extra-infos', function () {
    $extraInfos = \App\Models\ExtraInfo::all();
    foreach ($extraInfos as $extraInfo) {
        echo $extraInfo->user->name;
        echo $extraInfo->user->email;
    }
});


Route::get('/category', function () {
    $categories = \App\Models\Category::all();
    return view('category', ['categories' => $categories]);
});

Route::get('/one-post', function () {
    $post = \App\Models\Post::find(1);
    echo $post->title . " thuộc danh mục " . $post->category->name;
});


Route::get('/tags', function () {
    $tags = \App\Models\Tag::all();
    return view('tags', ['tags' => $tags]);
});

Route::get('/posts', function () {
    $tags = \App\Models\Post::all();
    return view('posts', ['posts' => $tags]);
});

Route::get('/demo-morph-1-1', function () {
    $posts = \App\Models\Post::all();
    $products = \App\Models\Product::all();
    return view('demo-morph-1-1', ['posts' => $posts,'products'=>$products]);
});

Route::get('/tagable', function () {
    $posts = \App\Models\Post::all();
    $products = \App\Models\Product::all();
    return view('tagable',compact('posts','products'));
});
