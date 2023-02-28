<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Order_detail;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view( 'admin.order.index',compact('orders') );
    }
    public function formorder()
    {
        return view('shop.includes.checkout');
    }
    public function checkout(Request $request)
    {
        $order = new Order;
        $order->customer_id = auth()->guard('customers')->user()->id;
        $order->total = 0;
        $order->status = 0;
        $order->date_ship = null;
        dd($order);
        // $order->save();
    }
    public function details($id)
    {
        $items=DB::table('order_detail')
        ->join('orders','order_detail.order_id','=','orders.id')
        ->join('products','order_detail.product_id','=','products.id')
        ->select('products.*', 'order_detail.*','orders.id')
        ->where('orders.id','=',$id)->get();
        return view('admin.order.details',compact('items'));
    }
}
