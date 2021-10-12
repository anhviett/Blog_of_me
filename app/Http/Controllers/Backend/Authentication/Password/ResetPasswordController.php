<?php

namespace App\Http\Controllers\Backend\Authentication\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ResetPasswordController extends Controller
{
    public function index($email, $token){
        $user = User::whereEmail($email)->first();
        return view('admin.auth.password.reset-password',compact('user','token'));
    }

    public function reset(StorePostRequest $request, $email, $token){
        $user = User::whereEmail($email);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        if ($user){
            return redirect()->route('login')->with('success','Thành công')->with(['token' => $token]);

        }else{
            return redirect()->route('forgot.create')->with('error', 'That bai');
        }

    }

}
