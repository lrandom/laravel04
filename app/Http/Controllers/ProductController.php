<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function list()
    {
        $list = Product::all();
        return view('cart.list', compact('list'));
    }
}
