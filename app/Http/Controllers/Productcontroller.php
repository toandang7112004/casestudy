<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
class Productcontroller extends Controller
{
    //danh sách các sản phẩm
    public function index(){
        $products = Product::all();
        // dd($products);
        $categories = Category::all();
        return view('admin.product.index',compact('products','categories'));
    }
    //form thêm mới
    public function create(){
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }
    //thêm mới
    public function store(Request $request){
        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            // dd($get_image);
            $get_name_image = $get_image->getClientOriginalName();
            // dd($get_name_image);
            $path = 'public/uploads/';
            $name_image = current(explode('.', $get_name_image));
            // dd($name_image);
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            // dd($new_image);
            $get_image->move($path, $new_image);
            $products->image = $new_image;
            // dd($products);
            $products->save();
        }
        try {
            $products->save();
            return redirect()->route('products.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            $e->getMessage();
        }
    }
    //form cập nhật
    public function edit($id){
        $products = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('products','categories'));
    }
    //cập nhật
    public function update(Request $request,$id){
        $products = Product::find($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->category_id = $request->category_id;
        //kiểm tra fil có tồn tại hay không
        if($request->hasFile('image')){
            //lấy file
            $get_image = $request->file('image');
            //lấy tên file
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'public/uploads/';
            //xóa đuôi
            $name_image = current(explode('.', $get_name_image));
            //thay đuôi thành jpg
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            //đưa ảnh vào thư mụa public/uploads
            $get_image->move($path, $new_image);
            //gán ảnh
            $products->image = $new_image;
            //lưu ảnh
            $products->save();
        }
        try {
            $products->save();
            return redirect()->route('products.index');
        } catch (\exception $e) {
            $e->getMessage();
        }
    }
    //xóa tạm thời
    public function delete($id){
        $products = Product::find($id);
        try {
            $products->delete();
            return redirect()->route('products.index');
        } catch (\exception $e) {
            $e->getMessage();
        }
    }
    //thùng rác
    public function Garbagecan(){
        // dd($product);
        $softs = Product::onlyTrashed()->get();
        // dd($softs);
        return view('admin.product.soft',compact('softs'));
    }
    //khôi phục
    public function restore($id){
        // dd($id);
        $softs = Product::withTrashed()->find($id);
        $softs->restore();
        return redirect()->route('products.index');
    }
    //xóa vĩnh viễn
    public function deleteforever($id){
        $softs = Product::withTrashed()->find($id);
        $softs->forceDelete();
        return redirect()->route('products.index');
    }

    //search
    public function search(Request $request ){
        $products = Product::where('name','Like','%'.$request->search.'%')
                            ->orwhere('price',$request->search)
                            ->get();
        return view('admin.product.search',compact('products'));
    }
}
