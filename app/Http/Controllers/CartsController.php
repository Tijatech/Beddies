<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // DB::enableQueryLog();
        $cart = $user->carts;
        // logger(DB::getQueryLog());
        // DB::disableQueryLog();
        return view('products.cart',['cart'=>$cart]);
    }


    public function store(Request $request)
    {

            $qty =request('qty');
            $product_id = request('product_id');
            $user_id = auth()->user()->id;
            $carts = Cart::whereRaw('user_id = '.$user_id .' and product_id ='. $product_id)->first();


            $product = Product::find(request('product_id'));
            if (!empty($carts)) {
                        $carts->qty += $qty;
                        $carts->price += $qty * $product->price;
                        $carts->save();

            }else{
                $cart = new Cart();
                $cart->product_name = $product->product_name;
                $cart->price = $qty * $product->price;
                $cart->qty = $qty;
                $cart->user_id = $user_id;
                $cart->product_id = $product_id;
                $cart->save();
            }


            return redirect('/cart');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');

    }
}
