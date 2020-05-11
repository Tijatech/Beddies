<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\User;
use App\Order;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function create(){
        return view('create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'product_img' => 'required|image|max:1999',
            'description' => 'required'
        ]);

        // Working with the image
        $fileNameWithExt = $request->file('product_img')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('product_img')->getClientOriginalExtension();

        $fileNameToStore = $fileName.'_'.time().'.'.$ext;
        $path = $request->file('product_img')->storeAs('public/product_images',$fileNameToStore);


        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->product_img = $fileNameToStore;
        $product->save();
        return redirect('/dashboard');
    }
    public function edit(Product $product)
    {
        return view('edit',['product'=> $product]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        $product = Product::find($id);
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->save();
        return redirect('/dashboard');
    }

    public function destroy(Product $product){
        $cart = Cart::where('product_id',$product->id);
        $cart->delete();
        $product->delete();

        return redirect('dashboard');
    }

}
