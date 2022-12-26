<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.includes.content');
// });
// Route::get('/', function () {
//     return view('shop.includes.blog');
//     // return view('shop.layouts.master');
//     return view('shop.cart');
// });


// trang chủ admin
Route::get('/trang_chu',[AdminController::class,'profile'])->name('profile');

//đổi mật khẩu admin
Route::get('/setting',[AdminController::class,'setting'])->name('setting');
Route::post('/settied',[AdminController::class,'settied'])->name('settied');

Route::prefix('admin')->group(function () {
    //đăng nhập
    Route::get('/login',[AdminController::class,'formlogin'])->name('formlogin');
    Route::post('/adminlogin',[AdminController::class,'login'])->name('admin.login');
    //đăng kí
    Route::get('/register',[AdminController::class,'formregister'])->name('formregister');
    Route::post('/adminregister',[AdminController::class,'register'])->name('admin.register');
    //đăng xuất
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
});

//categories
Route::prefix('categories')->group(function () {
    Route::get( '/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('{id}',[CategoryController::class,'update'])->name('categories.update');
    //thùng rác
    Route::delete('{id}',[CategoryController::class,'delete'])->name('categories.delete');
    Route::get('/Garbagecan',[CategoryController::class,'Garbagecan'])->name('categories.Garbagecan');
    Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('categories.restore');
    Route::get('/deleteforever/{id}',[CategoryController::class,'deleteforever'])->name('categories.deleteforever');
});
// products
Route::prefix('products')->group(function () {
    //index products
    Route::get( '/',[ProductController::class,'index'])->name('products.index');
    //thêm mới
    Route::get('/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/store',[ProductController::class,'store'])->name('products.store');
    //update
    Route::get('/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
    Route::put('{id}',[ProductController::class,'update'])->name('products.update');
    //xóa mềm
    Route::delete('{id}',[ProductController::class,'delete'])->name('products.delete');
    Route::get('/Garbagecan',[ProductController::class,'Garbagecan'])->name('products.Garbagecan');
    Route::get('/restore/{id}',[ProductController::class,'restore'])->name('products.restore');
    Route::get('/deleteforever/{id}',[ProductController::class,'deleteforever'])->name('products.deleteforever');
    //tìm kiếm
    Route::get('/search',[ProductController::class,'search'])->name('products.search');
});
//shop
Route::prefix('shop')->group(function () {
    Route::get('/index', [ShopController::class,'index'])->name('shop.index');
    //chi tiết đơn hàng
    Route::get('products',[ShopController::class,'index'])->name('index');
    Route::get('products/{id}', [ShopController::class, 'show'])->name('show');
    //đăng kí
    Route::get('/register',[ShopController::class,'formregister'])->name('formregistershop');
    Route::post('/shopregister',[ShopController::class,'register'])->name('shop.register');
    //đăng nhập  
    Route::get('/login',[ShopController::class,'formlogin'])->name('formloginshop');
    Route::post('/shoplogin',[ShopController::class,'login'])->name('shop.login');
    //trang chủ
    Route::get('/trang_chu',[ShopController::class,'profile'])->name('shop.profile');
});
//customers
Route::prefix('customer')->group(function () {
    Route::get('/index',[CustomerController::class,'index'])->name('customers.index');
});
//đơn hàng
Route::prefix('order')->group(function(){
    Route::get('/formorder',[OrderController::class,'formorder'])->name('formorder');
    Route::post('/order',[OrderController::class,'order'])->name('order');
});

//giỏ hàng
Route::get('cart', [ShopController::class,'cart'])->name('show.cart');
Route::get('add-to-cart/{id}', [ShopController::class,'addToCart'])->name('add-to-cart');
Route::patch('update-cart', [ShopController::class,'update1'])->name('update-cart');
Route::delete('remove-from-cart', [ShopController::class,'remove'])->name('remove-from-cart');
//gửi mail khi quên mk
Route::get('forget-password', [ShopController::class,'forgetpass'])->name('show.forgetpass');
Route::post('post-forget-password', [ShopController::class,'postforgetpass'])->name('show.postforgetpass');