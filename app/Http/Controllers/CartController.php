<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if ($foundIndex !== false && $foundIndex >= 0) {
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

    public function removeCartItem($id)
    {
        $cart = collect(session('cart', []));
        $tmpCart = $cart->filter(function ($item) use ($id) {
            return $item['product']->id != $id;
        })->values();
        session()->put('cart', $tmpCart->toArray());
        return redirect()->back();
    }

    public function updateQuantity($id, $quantity)
    {
        $cart = collect(session('cart', []));
        $foundIndex = $cart->search(function ($item, $index) use ($id) {
            return $item['product']->id == $id;
        });
        $cart = $cart->toArray();

        if ($foundIndex !== false && $foundIndex >= 0
            && ($cart[$foundIndex]['quantity'] > 1 && $quantity == -1)
            || ($quantity == 1)) {
            $cart[$foundIndex]['quantity'] += $quantity;
        }
        //gán ngược lại vào session
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function updateQuantityAPI($id, $quantity)
    {
        $cart = collect(session('cart', []));
        $foundIndex = $cart->search(function ($item, $index) use ($id) {
            return $item['product']->id == $id;
        });
        $cart = $cart->toArray();

        if ($foundIndex !== false && $foundIndex >= 0 && $quantity > 0) {
            $cart[$foundIndex]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);


        return response()->json([
            'status' => 'success',
            'data' => $cart,
            'cart-item' => $cart[$foundIndex]
        ]);
    }

    public function checkoutSuccess()
    {
        return view('cart.checkout-success');
    }


    public function checkout(Request $request)
    {
        //Lấy thông tin sản phẩm
        $cart = session('cart', []);
        if (count($cart) == 0) {
        }
        //Lấy thông tin khách hàng
        $data['received_name'] = $request->get('received_name');
        $data['received_phone'] = $request->get('received_phone');
        $data['received_address'] = $request->get('received_address');
        $cartCollect = collect($cart);
        $subTotal = $cartCollect->sum(function ($cartItem) {
            return $cartItem['quantity'] * $cartItem['product']->price;
        });
        $data['sub_total'] = $subTotal;
        $data['tax'] = $subTotal * 0.1;
        $data['total'] = $subTotal + $data['tax'];

        try {
            DB::beginTransaction();
            //Lưu thông tin vào bảng order
            $order = Order::create($data);
            //Lưu thông tin vào bảng order_product
            $cartCollect->each(function ($cartItem) use ($order) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'name' => $cartItem['product']->name,
                    'product_id' => $cartItem['product']->id,
                    'quantity' => $cartItem['quantity'],
                    'price' => $cartItem['product']->price,
                    'total' => $cartItem['quantity'] * $cartItem['product']->price
                ]);
            });
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

        //remove cart
        session()->forget('cart');
        return redirect()->route('cart.checkout-success')->with('success', 'Đặt hàng thành công');
    }
}
