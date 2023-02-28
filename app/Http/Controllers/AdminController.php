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
            return route('Home.index');
        } else {
            return view('admin.register');
        }
    }
    public function formlogin()
    {
       return view('admin.login');
    }
    public function login(StoreLoginPostRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toast('Đăng nhập thành công','success','top-right');
            return redirect()->route('Home.index');
        } else {
            toast('Đăng nhập thất bại','error','top-right');
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function setting()
    {
        return view(' admin.updatesetting ');
    }

    public function settied(PasswordStorePostRequest $request)
    {
        $users = User::find(auth()->id());
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
    public function forgetpass()
    {
        return view('admin.forgetpass');
    }
    public function quenmatkhauadmin(Request $request)
    {
        $customer = User::where('email', $request->email)->first();
        if ($customer) {
            $pass = Str::random(6);
            $customer->password = bcrypt($pass);
            $customer->save();
            $data = [
                'name' => $customer->name,
                'pass' => $pass,
                'email' => $customer->email,
            ];
            Mail::send('admin.email.password', compact('data'), function ($email) use ($customer) {
                $email->subject('Shop Hoa Qủa');
                $email->to($customer->email, $customer->name);
            });
        }
        return redirect()->route('formlogin');
    }
}