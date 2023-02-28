<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function create(){
        $this->authorize('create', Category::class);
        $groups = Group::all();
        $users = User::all();
        return view('admin.user.create',compact('groups', 'users'));
    }
    public function store(StoreUserRequest $request){
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->group_id = $request->group_id;
        try {
            $users->save();
            toast('Đăng kí nhân viên thành công','success','top-right');
            return redirect()->route('users.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Đăng kí nhân viên thất bại','error','top-right');
            return redirect()->route('users.create');
        }
    }public function delete($id){
        $this->authorize('delete', Category::class);
        $users = User::find($id);
        try {
            $users->delete();
            toast('Xóa nhân viên thành công','success','top-right');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast('Xóa nhân viên thất bại','error','top-right');
            return redirect()->route('users.index');
        }
    }
    public function edit($id){
        $this->authorize('update', Category::class);
        $users = User::find($id);
        $groups = Group::all();
        return view('admin.user.edit',compact('users','groups'));
    }
    public function update(UpdateUserRequest $request , $id){
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->group_id = $request->group_id;
        try {
            $users->save();
            toast('Sửa nhân viên thành công','success','top-right');
            return redirect()->route('users.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Sửa nhân viên thất bại','error','top-right');
            return redirect()->route('users.index');
        }
    }
}
