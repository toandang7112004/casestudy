<?php

namespace App\Http\Controllers;
use App\Policies\CategoryPolicy;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCategoryPostRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $categories = Category::paginate(3);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('admin.category.create');
    }
    public function store(StoreCategoryPostRequest $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        try {
            $categories->save();
            toast('Thêm loại sản phẩm thành công', 'success', 'top-right');
            return redirect()->route('categories.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Thêm loại sản phẩm không thành công', 'error', 'top-right');
            return redirect()->route('categories.index');
        }
    }
    public function edit($id)
    {
        $this->authorize('update', Category::class);
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function update(StoreCategoryPostRequest $request, $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        try {
            $categories->save();
            toast('Chỉnh sửa loại sản phẩm thành công', 'success', 'top-right');
            return redirect()->route('categories.index')->with('status', 'Chỉnh sửa thành công');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Chỉnh sửa loại sản phẩm không thành công', 'error', 'top-right');
            return redirect()->route('categories.index')->with('status1', 'Chỉnh sửa thất bại');
        }
    }
    public function delete($id)
    {
        $this->authorize('delete', Category::class);
        $categories = Category::find($id);
        try {
            $categories->delete();
            toast('Xóa loại sản phẩm thành công', 'success', 'top-right');
            return redirect()->route('categories.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Xóa loại sản phẩm thành công', 'error', 'top-right');
            return redirect()->route('categories.index');
        }
    }
    public function Garbagecan()
    {
        $softs = Category::onlyTrashed()->get();
        return view('admin.category.soft', compact('softs'));
    }
    public function restore($id)
    {
        $this->authorize('restore', Category::class);
        $softs = Category::withTrashed()->find($id);
        try {
            $softs->restore();
            toast('Khôi phục loại sản phẩm thành công', 'success', 'top-right');
            return redirect()->route('categories.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Khôi phục loại sản phẩm không thành công', 'error', 'top-right');
            return redirect()->route('categories.index');
        }

        return redirect()->route('categories.index');
    }
    public function deleteforever($id)
    {
        $this->authorize('deleteforever', CategoryPolicy::class);
        $softs = Category::withTrashed()->find($id);
        try {
            $softs->forceDelete();
            toast('Xóa vĩnh viễn loại sản phẩm thành công', 'success', 'top-right');
            return redirect()->route('categories.index')->with('status', 'Xóa vĩnh viễn thành công');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Xóa vĩnh viễn loại sản phẩm không thành công', 'error', 'top-right');
            return redirect()->route('categories.index')->with('status1', 'Không xóa được sản phẩn này!');
        }
    }
}
