<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreLoginPostRequest;
use App\Http\Requests\StoreRegisterPostRequest;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    //trang chủ
    public function index()
    {
        $Products = Product::all();
        // dd($Products);
        return view('shop.includes.blog', compact('Products'));
    }
    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        $product->view_count++;
        $product->save();
        return view('shop.includes.show', compact('product'));
    }
    //form đăng kí
    public function formregister()
    {
        return view('shop.includes.register');
    }
    //xử lí đămh kí
    public function register(StoreRegisterPostRequest $request)
    {
        $customer = new Customer;
        // dd($customer);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->password = bcrypt($request->password);
        if ($request->password == $request->passwordagain) {
            $customer->save();
            return redirect()->route('formloginshop')->with('status', 'Đăng Kí Thành Công');
        } else {
            return redirect()->route('formregistershop')->with('status', 'Mật Khẩu Không trùng khớp');
        }
    }
    //form login
    public function formlogin()
    {
        return view('shop.includes.login');
    }
    //xử lí login
    public function login(StoreLoginPostRequest $request)
    {
        // dd(Auth::guard('customers')->attempt(['email' => $request->email , 'password' => $request->password]));
        if (Auth::guard('customers')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd(123);
            return redirect()->route('shop.profile');
        } else {
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
    //view giỏ hàng
    public function cart()
    {
        return view('shop.includes.cart');
    }
    //thêm vào giỏ hàng
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
    //quên mật khẩu
    public function forgetpass(){
        return view('shop.includes.forgetpass');
    }
    //xử lí quên mật khẩu
    public function quenmatkhau(Request $request){
        $customer = Customer::where('email',$request->email)->first();
        if($customer){
            $pass = Str::random(6);
            $customer->password = bcrypt($pass);
            $customer->save();
                $data = [
                    'name' => $customer->name,
                    'pass' => $pass,
                    'email' =>$customer->email,
                ];
                Mail::send('shop.email.password', compact('data'), function ($email) use($customer){
                    $email->subject('Shop shop');
                    $email->to($customer->email, $customer->name);
                });
            }
            return redirect()->route('formloginshop');
        }
        
}
