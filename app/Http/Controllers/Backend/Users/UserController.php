<?php

namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
}
    public function create(){
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.create', compact('users', 'roles'));
    }
    public function store(Request $request){
        $users = new User();

        if($request->hasFile('UserAvatarAdd')){
            $img_path = saveFile($request->file('UserAvatar'), 'UserAvatar/' . date('Y/m/d'));
            $users->avatar = $img_path;

        }
        $users->firstname = $request->input('inputFirstname');
        $users->lastname = $request->input('inputLastname');
        $users->email = $request->input('inputEmail');
        $users->password = Hash::make($request->input('inputPassword'));
        $roleId = $request->role_id;
        /*foreach ($roleId as $lev){
            $users->level = $lev;
        }*/
        $users->roles()->sync($roleId);
        $users->save();

        if($users){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $users = user::find($id);
        if($request->hasFile('UserAvatarEdit')){
            $img_path = saveFile($request->file('UserAvatar'), 'UserAvatar/' . date('Y/m/d'));
            $users->avatar = $img_path;

        }
        $users->firstname = $request->input('inputFirstname');
        $users->lastname = $request->input('inputLastname');
        $users->email = $request->input('inputEmail');
        $users->password = Hash::make($request->input('inputPassword'));
        $roleId = $request->role_id;
        /*foreach ($roleId as $lev){
            $users->level = $lev;
        }*/
        $users->roles()->sync($roleId);
        $users->save();
        if($users){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $users =  User::all()->find($id);
        $roles = Role::all();
        $roleUser = $users->roles;

        return view('admin.users.edit', compact('users', 'roles', 'roleUser'));

    }
    public function delete($id){
        User::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function userChangeStatus(Request $request){
        $users = User::find($request->user_id);
        $users->status = $request->status;
        $users->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

}
