<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;
use App\models\Category;
use App\models\Product;
use App\models\Order;
class HomeController extends Controller
{
    public function index(){
        $customers = Customer::pluck('id')->count();
        $products = Product::pluck('id')->count();  
        $categories = Category::pluck('id')->count();  
        $orders = Order::pluck('id')->count();  
        return view('admin.includes.content',compact('customers','products','categories','orders'));
    }
}   
