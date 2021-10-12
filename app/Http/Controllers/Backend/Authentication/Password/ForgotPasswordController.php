<?php

namespace App\Http\Controllers\Backend\Authentication\Password;

use App\Http\Controllers\Controller;
use App\Mail\resetPassword;
use App\Mail\verifyEmail;
use App\Models\ResetPasswordUser;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function create(){
        return view('admin.auth.password.forgot-password');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $reset_password = new ResetPasswordUser();
        $token_random = Str::random(60);
        $reset_password->token = $token_random;
        $reset_password->email = $request->email;
        $reset_password->save();
        $user = User::where('email', $request->email)
            ->first();
        //Neu co user thi moi gui email
        Mail::to($request->email)->send(new resetPassword($user, $token_random));
        session()->put('email_resend', $request->email);
        return back()->with('success', 'Chúng tôi đã gửi link đặt lại mật khẩu cho bạn!');


    }
}
