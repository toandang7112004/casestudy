<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryPostRequest;
class CategoryController extends Controller
{
    //categories
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    //form thêm
    public function create(){
        return view('admin.category.create');
    }
    //xử lí thêm
    public function store(StoreCategoryPostRequest $request){
        $categories = new Category();
        $categories->name = $request->name;
        // dd($categories);
        try {
            $notification = [
                'message' => 'Thêm Thành Công!',
                'alert-type' => 'success', 
            ];
            $categories->save();
            // success('thành công');
            return redirect()->route( 'categories.index' )->with($notification);
        } catch (\exception $e) {
            $e->getMessage();
        }
    }
    //form edit
    public function edit($id){
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }
    //xử lí cập nhật
    public function update(StoreCategoryPostRequest $request,$id){
        $categories = Category::find($id);
        $categories->name = $request->name;
        try {
            $categories->save();
            return redirect()->route('categories.index');
        } catch (\exception $e) {
            $e->getMessage();
        }
    }
    //xóa
    public function delete($id){
        $categories = Category::find($id);
        try {
            $notification = [
                'message' => 'Xóa thành công',
                'alert-type' => 'success', 
            ];
            $categories->delete();
            return redirect()->route('categories.index')->with($notification);
        } catch (\exception $e) {
            
            return redirect()->route('categories.index')->with($notification);
            $e->getMessage();
        }
    }
    //thùng rác
    public function Garbagecan(){
        $softs = Category::onlyTrashed()->get();
        return view('admin.category.soft',compact('softs'));
    }
    public function restore($id){
        $softs = Category::withTrashed()->find($id);
        $softs->restore();
        return redirect()->route('categories.index');
    }
    public function deleteforever($id){
        $softs = Category::withTrashed()->find($id);
        $softs->forceDelete();
        return redirect()->route('categories.index');
    }
   
}