<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class PagesController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('pages.index',['products'=>$products]);
    }
    public function single_product(Product $product){
        return view('pages.single_product',['product'=>$product]);
    }

}
