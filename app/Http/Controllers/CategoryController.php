<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreCategoryPostRequest;
class CategoryController extends Controller
{
    //categories
    public function index(){
        
        $categories = Category::paginate(3);
        // $this->authorize('viewAny', User::class);
        // if (auth()->user()->can('viewAny', User::class)) {
            return view('admin.category.index',compact('categories'));
        // }else{
            // abort(404);
        // }
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
            return redirect()->route( 'categories.index' )->with('status','Thêm thành công');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('status1','Thêm thất bại');;
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
            return redirect()->route('categories.index')->with('status','Chỉnh sửa thành công');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('status1','Chỉnh sửa thất bại');
        }
    }
    //xóa
    public function delete($id){
        $categories = Category::find($id);
        try {
            $categories->delete();
            return redirect()->route('categories.index')->with('status','Xóa thành công');
        } catch (\exception $e) {
            return redirect()->route('categories.index')->with('status1','Xóa thất bại');
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
        try {
            $softs->restore();
            return redirect()->route('categories.index')->with('status','Khôi phục thành công!');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('status1','Khôi phục thất bại!');
        }

        return redirect()->route('categories.index');
    }
    public function deleteforever($id){
        $softs = Category::withTrashed()->find($id);
        try {
            $softs->forceDelete();
            return redirect()->route('categories.index')->with('status','Xóa vĩnh viễn thành công');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('status1','Không xóa được sản phẩn này!');
        }
    }
    public function export(){
        return Excel::download(new CategoryExport, 'categories.xlsx');
    }
}