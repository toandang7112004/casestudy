<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreLoginPostRequest;
use App\Http\Requests\StoreRegisterPostRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index()
    {
        $Products = Product::get();

        return view('shop.includes.blog', compact('Products'));
    }
    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        $product->view_count++;
        $product->save();
        return view('shop.includes.show', compact('product'));
    }
    public function formregister()
    {
        return view('shop.includes.register');
    }

    public function register(StoreRegisterPostRequest $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->password = bcrypt($request->password);
        if ($request->password == $request->passwordagain) {
            $customer->save();
            toast('Đăng nhập thành công','success','top-right');
            return redirect()->route('formloginshop');
        } else {
            return redirect()->route('formregistershop');
        }
    }
    public function formlogin()
    {
        return view('shop.includes.login');
    }
    public function login(StoreLoginPostRequest $request)
    {
        try {
            if (Auth::guard('customers')->attempt(['email' => $request->email, 'password' => $request->password])) {
                toast('Đăng nhập thành công','success','top-right');
                return redirect()->route('shop.profile');
            }else{
                return redirect()->route('formloginshop');
            }
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Đăng nhập thất bại','success','top-right');
            return redirect()->route('formloginshop');
        }
    }
    public function profile()
    {
        if (Auth::guard('customers')->check()) {
            return redirect()->route('shop.index');
        } else {
            return redirect()->route('formloginshop');
        }
    }
    public function cart()
    {
        return view('shop.includes.cart');
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back();
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back();
        }
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back();
    }
    //cập nhật giỏ hàng
    public function update1(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }
    //xóa giỏ hàng
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }
    public function forgetpass()
    {
        return view('shop.includes.forgetpass');
    }
    public function quenmatkhau(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        if ($customer) {
            $pass = Str::random(6);
            $customer->password = bcrypt($pass);
            $customer->save();
            $data = [
                'name' => $customer->name,
                'pass' => $pass,
                'email' => $customer->email,
            ];
            Mail::send('shop.email.password', compact('data'), function ($email) use ($customer) {
                $email->subject('Shop shop');
                $email->to($customer->email, $customer->name);
            });
        }
        return redirect()->route('formloginshop');
    }
    public function ajaxSearch()
    {
        $data = Product::search()->get();
        return $data;
    }
    public function comment(Request $request){
        $comments = new Comment();
        $comments->content = $request->content;
        $comments->customer_id = $request->customer_id;
        $comments->product_id = $request->product_id;
        // dd($comments);
        try {

            $comments->save();
            toast('Bình luận thành công','success','top-right');
            return redirect()->route('index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Bình luận thất bại','error','top-right');
            return redirect()->route('shop.index');
        }
    }
}
