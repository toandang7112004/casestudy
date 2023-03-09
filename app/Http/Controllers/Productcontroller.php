<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreProductPostRequest;
use App\Imports\productImport;
use Illuminate\Support\Facades\Log;
use App\Policies\ProductPolicy;
class Productcontroller extends Controller
{
    //danh sách các sản phẩm
    public function index(){
        $this->authorize('viewAny', Product::class);
        $products = Product::paginate(3);
        $categories = Product::with('category')->get();
        return view('admin.product.index',compact('products','categories'));
    }
    //form thêm mới
    public function create(){
        $this->authorize('create', Product::class);
        $categories = Category::all();
        $product = Product::all();
        return view('admin.product.create',compact('categories','product'));
    }
    //thêm mới
    public function store(StoreProductPostRequest $request){
        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->category_id = $request->category_id;
        if ($request->has('is_visible')) {
            $products->is_visible = $request->has('is_visible');
        }else{
            $products->is_visible = 0;
        }
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
        }
        try {
            $products->save();
            toast('Thêm sản phẩm thành công','success','top-right');
            return redirect()->route('products.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Thêm sản phẩm không thành công','error','top-right');
            return redirect()->route('products.index');
        }
    }
    //form cập nhật
    public function edit($id){
        $this->authorize('update', Product::class);
        $products = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('products','categories'));
    }
    //cập nhật
    public function update(Request $request,$id){
        $products = Product::find($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->category_id = $request->category_id;
        if ($request->has('is_visible')) {
            $products->is_visible = $request->has('is_visible');
        }else{
            $products->is_visible = 0;
        }
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
        }
        try {
            $products->save();
            toast('Sửa sản phẩm thành công','success','top-right');
            return redirect()->route('products.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Sửa sản phẩm không thành công','error','top-right');
            return redirect()->route('products.index');
        }
    }
    //xóa tạm thời
    public function delete($id){
        $this->authorize('delete', Product::class);
        $products = Product::find($id);
        try {
            $products->delete();
            toast('Xóa sản phẩm thành công','success','top-right');
            return redirect()->route('products.index')->with('status','Xóa thành công');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Đưa vào thùng rác','error','top-right');
            return redirect()->route('products.index')->with('status1','Xóa thất bại');
        }
    }
    public function Garbagecan(){
        $softs = Product::onlyTrashed()->get();
        return view('admin.product.soft',compact('softs'));
    }
    public function restore($id){
        $this->authorize('restore', Product::class);
        $softs = Product::withTrashed()->find($id);
        try {
            $softs->restore();
            toast('khôi phục sản phẩm thành công','success','top-right');
            return redirect()->route('products.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('khôi phục sản phẩm không thành công','error','top-right');
            return redirect()->route('products.index');
        }
        return redirect()->route('products.index');
    }
    public function deleteforever($id){
        $this->authorize('deleteforever', Product::class);
        $softs = Product::withTrashed()->find($id);
        try {
            $softs->forceDelete();
            toast('xóa vĩnh viễn sản phẩm thành công','success','top-right');
            return redirect()->route('products.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('xóa vĩnh viễn sản phẩm không thành công','error','top-right');
            return redirect()->route('products.index');
        }
    }
    public function search(Request $request ){
        $products = Product::where('name','Like','%'.$request->search.'%')
                            ->orwhere('price',$request->search)
                            ->get();
        return view('admin.product.search',compact('products'));
    }
    public function export(){
        return Excel::download(new ProductExport,'products.xlsx');
    }
    public function import(Request $request)
    {
        Excel::import(new productImport, $request->file('file'));
        toast('Dữ liệu đã được import thành công!','success','top-right');
        return redirect()->route('products.index');
    }
}
