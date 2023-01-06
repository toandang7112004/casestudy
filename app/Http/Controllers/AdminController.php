<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use  App\Http\Requests\StoreLoginPostRequest;
use  App\Http\Requests\StoreRegisterPostRequest;
use  App\Http\Requests\PasswordStorePostRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //trang chủ
    public function profile()
    {
        if (Auth::check()) {
            // return view('admin.includes.content');
            return route('Home.index');
        } else {
            return view('admin.register');
        }
    }
    //đăng kí
    public function formregister()
    {
        return view('admin.register');
    }
    public function register(StoreRegisterPostRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        if ($request->passwordagain == $request->password) {
            $user->save();
            return redirect()->route('formlogin')->with('status', 'Đăng Kí thành công!');
        } else {
            // dd(1);
            return redirect()->route('formregister')->with('status', 'Mật khẩu không trùng khớp!');
        }
    }
    //đăng nhập
    public function formlogin()
    {
        if (Auth::check()) {
            return view('admin.includes.content');
        } else {
            return view('admin.login');
        }
    }
    public function login(StoreLoginPostRequest $request)
    {
        // dd(1);
        // dd(Auth::attempt(['email' => $request->email,'password' => $request->password]));
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd(1);
            return redirect()->route('Home.index')->with('status', 'Đăng nhập thành công');
        } else {
            // dd(123);
            return redirect()->route('formlogin')->with('status1', 'Mật khẩu không đúng!');
        }
    }

    // đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('formlogin');
    }

    // form cập nhật tài khoản
    public function setting()
    {
        return view(' admin.updatesetting ');
    }

    // cập nhật tài khoản
    public function settied(PasswordStorePostRequest $request)
    {
        $users = User::find(auth()->id());
        // dd($request);
        if ($request->change_password == 'on') {
            $users->password = bcrypt($request->password);
        };
        try {
            $users->save();
            return redirect()->route('setting')->with('status', 'Đổi mật khẩu thành công!');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('setting')->with('status1', 'Đổi mật khẩu thất bại!');
        }

        return view('admin.includes.content');
    }

    //gửi mail
    public function forgetpass()
    {
        return view('admin.forgetpass');
    }
    public function quenmatkhauadmin(Request $request)
    {
        $customer = User::where('email', $request->email)->first();
        // dd($customer);
        if ($customer) {
            $pass = Str::random(6);
            // dd($pass);
            $customer->password = bcrypt($pass);
            // dd($customer);
            $customer->save();
            $data = [
                'name' => $customer->name,
                'pass' => $pass,
                'email' => $customer->email,
            ];
            // dd($data);
            Mail::send('admin.email.password', compact('data'), function ($email) use ($customer) {
                $email->subject('Shop Hoa Qủa');
                $email->to($customer->email, $customer->name);
            });
        }
        return redirect()->route('formlogin');
    }
}