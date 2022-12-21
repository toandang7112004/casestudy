<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{

    //trang chủ
    public function index(){
        $Products = Product::all();
        // dd($Products);
        return view('shop.includes.blog',compact('Products'));
    }
    public function cart($id){
        $products = Product::find($id);
        return view('shop.includes.cart',compact('products'));
    }
    public function build(){
        return view('shop.includes.build');
    }

    
}
