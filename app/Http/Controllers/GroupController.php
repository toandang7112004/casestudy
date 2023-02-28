<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    public function index(){
        $this->authorize('viewAny', Group::class);
        $groups = Group::all();
        return view('admin.groups.index', compact('groups'));
    }
    public function create(){
        $this->authorize('create', Group::class);
        return view('admin.groups.create');
    }
    public function store(StoreGroupRequest $request){
        $groups = new Group();
        $groups->name = $request->name;
        try {
            $groups->save();
            toast('Thêm tên quyền thành công','success','top-right');
            return redirect()->route('group.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Thêm tên quyền không thành công','error','top-right');
            return redirect()->route('group.index');
        }
    }
    public function edit($id){
        $this->authorize('update', Group::class);
        $group = Group::find($id);
        return view('admin.groups.edit', compact('group'));
    }
    public function update(UpdateGroupRequest $request, $id){
        $group = Group::find($id);
        $group->name = $request->name;
        try {
            $group->save();
            toast('sửa tên quyền thành công','success','top-right');
            return redirect()->route('group.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('sửa tên quyền không thành công','error','top-right');
            return redirect()->route('group.index');
        }
    }
    public function destroy($id){
        $this->authorize('delete', Group::class);
        $group = Group::find($id);
        try {
            $group->delete();
            toast('Xóa tên quyền thành công','success', 'top-right');
            return redirect()->route('group.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast('Xóa tên quyền không thành công', 'error', 'top-right');
            return redirect()->route('group.index');
        }
    }
    public function trash(){
        $groups= Group::onlyTrashed()->get();
        return view('admin.groups.trash',compact('groups'));
    }
    public function restore($id){
        $this->authorize('restore', Group::class);
        $group = Group::withTrashed()->find($id);
        try {
            $group->restore();
            toast('khôi phục tên quyền thành công','success', 'top-right');
            return redirect()->route('group.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast('khôi phục tên quyền không thành công', 'error', 'top-right');
            return redirect()->route('group.index');
        }
    }
    public function forcedelete($id){
        $this->authorize('forcedelete', Group::class);
        $softs = Group::withTrashed()->find($id);
        try {
            $softs->forceDelete();
            toast('xóa vĩnh viễn tên quyền thành công','success','top-right');
            return redirect()->route('group.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('xóa vĩnh viễn tên quyền không thành công','error','top-right');
            return redirect()->route('group.index');
        }
    }
    public function detail($id)
    {
        $group = Group::find($id);
        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        $roles = Role::all()->toArray();
        $group_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.groups.detail', $params);
    }
    public function group_detail($id,Request $request)
    {
        $group = Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        toast('Sửa quyền thành công','success','top-right');
        return redirect()->route('group.index');
    }
}
