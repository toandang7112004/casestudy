<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequet;
use App\Http\Requests\ProductRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index(){
        // $this->authorize('viewAny', User::class);
        $users = User::all();
        // $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('admin.user.index', $param);
    }

    public function showAdmin(){

        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('admin.user.admin', $param);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];
        return view('admin.user.add', $param);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->save();

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        // Mail::send('admin.mail.mail', compact('data'), function ($email) use($request) {
        //     $email->subject('NowSaiGon');
        //     $email->to($request->email, $request->name);
        // });

        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    public function show($id)
    {
        // $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        $param =[
            'user'=>$user,
        ];


        // $productshow-> show();
        return view('admin.user.profile',  $param );
    }

    public function edit($id)
    {
        // $this->authorize('view', User::class);
        $user = User::find($id);
        $groups=Group::get();
        $param = [
            'user' => $user ,
            'groups' => $groups
        ];
        return view('admin.user.edit' , $param);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->group_id = $request->group_id;
        $user->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }
    public function destroy($id)
    {
        // $this->authorize('forceDelete', Product::class);
        $notification = [
            'sainhap' => '!',
        ];

        $user = User::find($id);
        if($user->group->name!='Supper Admin'){
            $user->delete();
        }
        else{
            return dd(__METHOD__);
        }
    }
}