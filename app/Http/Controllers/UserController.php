<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Role_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       $users = User::all();
       return view('admin.user.list', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $users =  new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = bcrypt($request->password);
            $users->address = $request->address;
            // $users->save();
            //    $roleids = $request->role_id;
            // dd($users->role());
            $users->role()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
            // foreach ($roleids as $roleitem){
            //     DB::table('Role_User')->insert([
            //         'role_id' => $roleitem,
            //         'user_id' => $users->id,
            //     ]);
            // }
        } catch (\exception $e) {
            DB::rollBack();
            Log::error($e->getMessage);
        }
    }
    public function edit($id)
    {
        $roles = Role::all();
        $users = User::find($id);
        $role_id = $users->role;
        // dd($role_id);
        return view('admin.user.edit',compact('roles','users','role_id'));
    }
    public function update(Request $request, $id)
    {  
        try {
        DB::beginTransaction();
        $users =  User::find($id);
        // dd($users);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->address = $request->address;
        $users->save();
        $users->role()->sync($request->role_id);
        DB::commit();
        return redirect()->route('users.index');
    } catch (\exception $e) {
        DB::rollBack();
        Log::error($e->getMessage);
    }
}
     //xóa tạm thời
     public function delete($id){
        $users = User::find($id);
        try {
            $users->delete();
            return redirect()->route('users.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index');
        }
    }
    //thùng rác
    public function Garbagecan(){
        $users = User::onlyTrashed()->get();
        return view('admin.user.soft',compact('users'));
    }
    //khôi phục
    public function restore($id){
        $users = User::withTrashed()->find($id);
        try {
            $users->restore();
            return redirect()->route('users.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index');
        }
        return redirect()->route('users.index');
    }
    //xóa vĩnh viễn
    public function deleteforever($id){
        $users = User::withTrashed()->find($id);
        try {
            $users->forceDelete();
            return redirect()->route('users.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index');
        }
    }
}