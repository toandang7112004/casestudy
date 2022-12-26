<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreShopPostRequest;
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
        // $productKey = 'product_' . $id;
        // dd($productKey);
        // dd(!$request->session()->has($productKey));
        // dd(session()->has($productKey));
        //kiểm tra session có tồn tại hay không
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        // if (!$request->session()->has($productKey)) {
        //     Product::where('id', $id)->increment('view_count');
        //     $request->Session()->put($productKey,1 );
        // }

        // Sử dụng Eloquent để lấy ra sản phẩm theo id

        $product = Product::find($id);
        $product->view_count++;
        $product->save();
        // dd(123);

        // Trả về view
        return view('shop.includes.show', compact('product'));
    }
    public function formregister()
    {
        return view('shop.includes.register');
    }
    public function register(StoreShopPostRequest $request)
    {
        $customer = new Customer;
        // dd($request->passwordagain);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->password = bcrypt($request->password);
        if ($request->password == $request->passwordagain) {
            $customer->save();
            return redirect()->route('formloginshop')->with('status', 'Đăng Kí Thành Công');
        } else {
            return redirect()->route('formregistershop')->with('status', 'Đăng Kí Thất Bại');
        }
    }
    public function formlogin()
    {
        return view('shop.includes.login');
    }
    public function login(Request $request)
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
    public function update1(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }
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
}
