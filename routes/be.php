<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

Route::prefix('admin')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'list'])->name('admin.user.list');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/do-create', [UserController::class, 'doCreate'])->name('admin.user.do-create');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/do-edit/{id}', [UserController::class, 'doEdit'])->name('admin.user.do-edit');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'list'])->name('admin.category.list');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/do-create', [CategoryController::class, 'doCreate'])->name('admin.category.do-create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/do-edit/{id}', [CategoryController::class, 'doEdit'])->name('admin.category.do-edit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'list'])->name('admin.post.list');
        Route::get('create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/do-create', [PostController::class, 'doCreate'])->name('admin.post.do-create');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::post('/do-edit/{id}', [PostController::class, 'doEdit'])->name('admin.post.do-edit');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
    });

});
?>
