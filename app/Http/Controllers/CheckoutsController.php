<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Order;
use App\Checkout;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('products.checkout')->with('carts',$carts);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 
            'address' => 'required',
            'cvv' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'card_no' => 'required',
            'name_on_card' => 'required',
            'exp_month' => 'required',
            'exp_day' => 'required'
        ]);
        $carts = Cart::where('user_id',auth()->user()->id)->get();

        $checkout = new Checkout();




        //Order details
            foreach ($carts as $cart) {
                $order = new Order();
                $order->user_id = auth()->user()->id;
                $order->product_id = $cart->id;
                $order->product_name = $cart->product_name;
                $order->qty = $cart->qty;
                $order->price = $cart->price;
                $order->save();
            }



         //Checkout details
         $checkout->full_name = $request->input('name');
         $checkout->user_id = auth()->user()->id;
         $checkout->address = $request->input('address');
         $checkout->city = $request->input('city');
         $checkout->state = $request->input('state');
         $checkout->zip = $request->input('zip');
         $checkout->name_on_card = $request->input('name_on_card');
         $checkout->card_no = $request->input('card_no');
         $checkout->cvv = $request->input('cvv');
         $checkout->exp_month = $request->input('exp_month');
         $checkout->exp_day = $request->input('exp_day');
         $checkout->total = $request->input('total');
         $checkout->save();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        return redirect('cart');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
