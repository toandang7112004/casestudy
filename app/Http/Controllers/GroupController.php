<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::search()->paginate(4);
        $users= User::get();
        // $param = [
        //     'groups' => $groups,
        //     'users' => $users
        // ];
        // dd($param);
        return view('admin.group.index', compact('groups') );
    }

    public function create()
    {
        // $this->authorize('create',Group::class);
        return view('admin.group.add');
    }

    public function store(Request $request)
    {

        $notification = [
            'addgroup' => 'Thêm Tên Quyền Thành Công!',
        ];
        $group=new Group();
        $group->name=$request->name;
        $group->save();
        return redirect()->route('group.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // $this->authorize('update',Group::class);

        $group = Group::find($id);
        return view('admin.group.edit', compact('group') );
    }

    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('group.index')->with($notification);
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
    }
    
    public function detail($id)
    {
        $group = Group::find($id);
        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $group_names = [];
        //lấy tên nhóm quyền
        // dd($roles);
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        // dd($params);
        return view('admin.group.detail',$params);
    }
    public function group_detail(Request $request,$id)
    {
        $notification = [
            'message' => 'Cấp Quyền Thành Công!',
            'alert-type' => 'success'
        ];
        $group= Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        return redirect()->route('group.index')->with($notification);;
    }
}