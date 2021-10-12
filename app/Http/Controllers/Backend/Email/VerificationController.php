<?php

namespace App\Http\Controllers\Backend\Email;

use App\Http\Controllers\Controller;
use App\Mail\resetPassword;
use App\Models\ResetPasswordUser;
use App\Models\User;
use App\Models\VerifyUser;
use App\Mail\verifyEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    public function create(){
        return view('admin.auth.verify');
    }
    public function resend(){
        Mail::to(session('email_resend'))->send(new verifyEmail(User::where('email', session('email_resend'))->first()));
        session()->put('resent', true);
        return redirect()->back();
    }
    public function verifyEmail($token){
        $verified_user = VerifyUser::where('token',$token)->first();
        if ($verified_user){
            $user = $verified_user->user;
            if (!$user->email_verified_at){
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect()->route('login')->with('success','Email kích hoạt thành công');
            }
            else{
                return redirect()->route('login')->with('error','Đã có sự cố xảy ra, vui lòng thử lại');
            }
        }
    }
    public function verifyPassword($token){
        $reset_password = ResetPasswordUser::where('token',$token)->first();
        if ($reset_password){

            return redirect()->route('reset.index')->with('success','Thành công');
        }else{
            return redirect()->route('forgot.create')->with('error','Đã có sự cố xảy ra, vui lòng thử lại');
        }
    }

}
