<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function () {
    Route::get('/products', function () {
        try {
            $products = \App\Models\Product::all();
            return response()->json($products, 200);
        } catch (Exception $e) {
            // http_response_code(500);
            //echo json_decode(array('status' => 'fail'));
            return response()->json(['status' => 'fail'], 500);
        }
    });

    Route::post('/products', function () {
        $name = \request()->input('name');
        $price = \request()->input('price');
        $content = \request()->input('content');

        try {
            $product = new \App\Models\Product();
            $product->name = $name;
            $product->price = $price;
            $product->content = $content;
            $product->save();
            return response()->json($product, 200);
        } catch (Exception $e) {
            // http_response_code(500);
            //echo json_decode(array('status' => 'fail'));
            return response()->json(['status' => 'fail' . $e->getMessage()], 500);
        }
    });


    Route::put('/products/{id}', function ($id) {
        $name = \request()->input('name');
        $price = \request()->input('price');
        $content = \request()->input('content');

        try {
            $product = \App\Models\Product::find($id);
            $product->name = $name;
            $product->price = $price;
            $product->content = $content;
            $product->save();
            return response()->json($product, 200);
        } catch (Exception $e) {
            // http_response_code(500);
            //echo json_decode(array('status' => 'fail'));
            return response()->json(['status' => 'fail' . $e->getMessage()], 500);
        }
    });

    Route::delete('/products/{id}', function ($id) {
        try {
            $product = \App\Models\Product::find($id);
            $product->delete();
            return response()->json($product, 200);
        } catch (Exception $e) {
            // http_response_code(500);
            //echo json_decode(array('status' => 'fail'));
            return response()->json(['status' => 'fail' . $e->getMessage()], 500);
        }
    });
});

Route::get('/update-api-token', function () {
    $users = \App\Models\User::all();
    foreach ($users as $user) {
        $user->api_token = \Illuminate\Support\Str::random(60);
        $user->save();
    }
    /*    foreach (\request()->user()->tokens as $token) {
            $token->delete();
        }
        $user = \request()->user();
        $user->api_token = \Illuminate\Support\Str::random(60);
        $user->save();*/
    return response()->json($users, 200);
});
