<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Role;
class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        // dd($roles);
        return view('admin.role.index',compact('roles'));
    }
    public function create(){
        return view('admin.role.create');
    }
}
