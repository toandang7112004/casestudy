<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function formorder(){
        return view('shop.includes.order');
    }
}
