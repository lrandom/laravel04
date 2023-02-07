<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart($id)
    {

        /*
         [
           [
              'product'=>'',
              'quantity'=>''
           ]
         ]
         * */
        //kiểm tra xem có session cart chưa
        //dd($id);
        $cart = collect(session('cart', []));
        $foundIndex = $cart->search(function ($item, $index) use ($id) {
            return $item['product']->id == $id;
        });
        $cart = $cart->toArray();
        if ($foundIndex!==false && $foundIndex >= 0) {
            $cart[$foundIndex]['quantity'] += 1;
        } else {
            array_push($cart, [
                'product' => Product::find($id),
                'quantity' => 1
            ]);
        }
        //dd($cart);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function list()
    {
        //session(['cart' => []]);
        //session()->flush();

        $cart = session()->get('cart', []);
        return view('cart.cart', compact('cart'));
    }
}
