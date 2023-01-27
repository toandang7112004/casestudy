<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        // dd($orders);
        return view( 'admin.order.index',compact('orders') );
    }
    public function formorder()
    {
        return view('shop.includes.order');
    }
    public function order(Request $request)
    {
        // dd(1);
        $orders = new Order;
        // dd($customer);
        $orders->customer_id = auth()->guard('customers')->user()->id;
        // dd(auth()->guard('customers')->user()->id);
        $orders->totalmoney = $request->totalmoney;
        $orders->total = $request->quantity;
        // $orders->save(); 
        // dd($orders);
        try {
            $orders->save();
            return redirect()->route('shop.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
        }
    }
    public function details($id)
    {

        $items=DB::table('order_detail')
        ->join('orders','order_detail.order_id','=','orders.id')
        ->join('products','order_detail.product_id','=','products.id')
        ->select('products.*', 'order_detail.*','orders.id')
        ->where('orders.id','=',$id)->get();
        // dd($items);
        return view('admin.order.details',compact('items'));
    }
}
