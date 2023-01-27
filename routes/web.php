<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\GroupController;
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




// trang chủ admin
Route::get('/home/index', [HomeController::class, 'index'])->name('Home.index');

//đổi mật khẩu admin
Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
Route::post('/settied', [AdminController::class, 'settied'])->name('settied');

Route::prefix('admin')->group(function () {
    //đăng nhập
    Route::get('/login', [AdminController::class, 'formlogin'])->name('formlogin');
    Route::post('/adminlogin', [AdminController::class, 'login'])->name('admin.login');
    //đăng kí
    Route::get('/register', [AdminController::class, 'formregister'])->name('formregister');
    Route::post('/adminregister', [AdminController::class, 'register'])->name('admin.register');
    //đăng xuất
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    //gửi mail khi quên mk customer
    Route::get('forget-password', [AdminController::class, 'forgetpass'])->name('admin.forgetpass');
    Route::post('/email', [AdminController::class, 'quenmatkhauadmin'])->name('quenmatkhauadmin');
});

//categories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('{id}', [CategoryController::class, 'update'])->name('categories.update');
    //thùng rác
    Route::delete('{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('/Garbagecan', [CategoryController::class, 'Garbagecan'])->name('categories.Garbagecan');
    Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::get('/deleteforever/{id}', [CategoryController::class, 'deleteforever'])->name('categories.deleteforever');
    //xuất excel
    Route::get('/export', [CategoryController::class, 'export'])->name('categories.export');
});
// products
Route::prefix('products')->group(function () {
    //index products
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    //thêm mới
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    //update
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('{id}', [ProductController::class, 'update'])->name('products.update');
    //xóa mềm
    Route::delete('{id}', [ProductController::class, 'delete'])->name('products.delete');
    Route::get('/Garbagecan', [ProductController::class, 'Garbagecan'])->name('products.Garbagecan');
    Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
    Route::get('/deleteforever/{id}', [ProductController::class, 'deleteforever'])->name('products.deleteforever');
    //tìm kiếm
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    //xuất excel
    Route::get('/export', [ProductController::class, 'export'])->name('products.export');
});
//shop
Route::prefix('shop')->group(function () {
    Route::get('/index', [ShopController::class, 'index'])->name('shop.index');
    //chi tiết đơn hàng
    Route::get('products', [ShopController::class, 'index'])->name('index');
    Route::get('products/{id}', [ShopController::class, 'show'])->name('show');
    //đăng kí
    Route::get('/register', [ShopController::class, 'formregister'])->name('formregistershop');
    Route::post('/shopregister', [ShopController::class, 'register'])->name('shop.register');
    //đăng nhập  
    Route::get('/login', [ShopController::class, 'formlogin'])->name('formloginshop');
    Route::post('/shoplogin', [ShopController::class, 'login'])->name('shop.login');
    //trang chủ
    Route::get('/trang_chu', [ShopController::class, 'profile'])->name('shop.profile');
});
//customers
Route::prefix('customer')->group(function () {
    Route::get('/index', [CustomerController::class, 'index'])->name('customers.index');
});
//checkout
Route::prefix('order')->group(function () {
    Route::get('/index', [OrderController::class, 'index'])->name('order.index');
    Route::get('/details/{id}', [OrderController::class, 'details'])->name('order.details');
    Route::get('/formorder', [OrderController::class, 'formorder'])->name('formorder');
    Route::post('/saveorder', [OrderController::class, 'order'])->name('saveorder');
});

//giỏ hàng
Route::get('cart', [ShopController::class, 'cart'])->name('show.cart');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add-to-cart');
Route::patch('update-cart', [ShopController::class, 'update1'])->name('update-cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove-from-cart');
//gửi mail khi quên mk customer
Route::get('forget-password', [ShopController::class, 'forgetpass'])->name('show.forgetpass');
Route::post('/email', [ShopController::class, 'quenmatkhau'])->name('quenmatkhau');
//user

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/admin', [UserController::class, 'showAdmin'])->name('user.admin');
});
Route::group(['prefix' => 'groups'], function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');

    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    // trao quyền
    Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
    Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
   });
   Route::group(['prefix' => 'groups'], function () {
   });