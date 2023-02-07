<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Controllers\FileController;

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
    return view('demo-morph-1-1', ['posts' => $posts, 'products' => $products]);
});

Route::get('/tagable', function () {
    $posts = \App\Models\Post::all();
    $products = \App\Models\Product::all();
    return view('tagable', compact('posts', 'products'));
});

Route::get('/demo-each', function () {
    /*$myCollect = collect([
        0, 1, 2, 3, 4, 5, 6, 7, 8, 9
    ]);

    $myCollect->each(function ($item, $key) {
        echo $item;
    });

    $myCollect->map(function ($item, $key) {
        return $item * 2;
    })->each(function ($item, $key) {
        echo $item;
    });

    $myCollect = collect([
        [
            'name' => 'Nguyen Van A',
        ],
        [
            'name' => 'Nguyen Van B',
        ],
        [
            'name' => 'Nguyen Van C',
        ],
    ]);

    $myCollect->pluck('name')->each(function ($item, $key) {
        echo $item;
    });*/

    /*$myCollect = collect([
        [
            'name' => 'Nguyen Van A',
            'age' => '30'
        ], [
            'name' => 'Nguyen Van B',
            'age' => '40'
        ]
    ]);

    $myCollect = $myCollect->pluck('name', 'age');
    dd($myCollect->all());

    $collection = collect([
        ['product_id' => 'prod-100', 'name' => 'Desk'],
        ['product_id' => 'prod-200', 'name' => 'Chair'],
    ]);

    $plucked = $collection->pluck('name', 'product_id');

    dd($plucked->all());*/

    //$myCollect = collect([1, 2, 3, 4, 5, 6, 6]);
    /*   $myCollect = $myCollect->filter(function ($item, $index) {
           return $item > 3;
       });*/
    /*$total = $myCollect->reduce(function ($carry, $item) {
        return $carry + $item;
    }, 0);
    dd($total);
    dd(3948394 + 92829382 + 938394834);*/
    /*$myCollect = collect([
        [
            'name' => 'Nguyen Van A',
            'age' => '30'
        ], [
            'name' => 'Nguyen Van B',
            'age' => '40'
        ]
    ])->flatten();
    dd($myCollect->all());*/
    \Illuminate\Support\Collection::macro('myEach', function ($callback) {
        foreach ($this->items as $key => $item) {
            $callback($item, $key);
        }
    });
});

Route::get('/upload-file', [FileController::class, 'uploadUI']);
Route::post('/do-upload', [FileController::class, 'upload'])->name('do-upload');
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'gallery'])->name('gallery.get');
Route::post('/gallery', [\App\Http\Controllers\GalleryController::class, 'gallery'])->name('gallery.post');
Route::get('/alert-browser', function () {
    return view('alert-browser');
})->name('alert-browser');

Route::get('/demo-middleware', function () {
    echo 'demo-middleware';
})->middleware(\App\Http\Middleware\AllowBrowserChrome::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('auth-user', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        dd(\Illuminate\Support\Facades\Auth::user()->email);
    } else {
        echo "Bạn chưa đăng nhập";
    }
});


Route::get('my-login', [\App\Http\Controllers\AuthController::class, 'login',
])->name('my-login');
Route::post('my-login', [\App\Http\Controllers\AuthController::class, 'doLogin',
])->name('my-login.post');
Route::get('my-profile', [\App\Http\Controllers\AuthController::class, 'profile',
])->name('my-profile');
