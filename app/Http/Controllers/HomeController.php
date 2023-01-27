<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;
use App\models\Category;
use App\models\Product;
use Illuminate\Support\Facades\DB;
use App\models\Order;
class HomeController extends Controller
{
    public function index(){
        $customers = Customer::pluck('id')->count();
        // dd($customers);
        $products = Product::pluck('id')->count();  
        $categories = Category::pluck('id')->count();  
        $orders = Order::pluck('id')->count();  

        $topcustomers = DB::table('customers')
        ->join('orders', 'customers.id', '=', 'orders.customer_id')
        ->selectRaw('customers.*, sum(orders.total) total')
        ->groupBy('customers.id')
        ->orderBy('total', 'desc')
        ->get();
        // dd($topcustomer);
        return view('admin.includes.content',compact('customers','products','categories','orders','topcustomers'));
    }
}   
