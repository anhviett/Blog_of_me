<?php


namespace App\Http\Controllers\Backend\Authentication;

use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class RegisterController extends Controller
{

    public function create()
    {
        return view('admin.auth.register');
    }

    public function store(StorePostRequest $request)
    {
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
       /* $user->level = 3;*/

        $user->save();

        //
        $verified_user = new VerifyUser();
        $verified_user->token = Str::random(60);
        $verified_user->user_id = $user->id;
        $verified_user->save();
        Mail::to($user->email)->send(new verifyEmail($user));
        session()->put('email_resend', $user->email);
        return redirect()->route('resend');
    }
    public function verifyAccount(Request $request)
    {
        $users = User::where('remember_token', $request['token'])->first();
        if (isset($users)) {
            $users->remember_token = null;
            $users->is_active = true;
            $users->email_verified_at = Carbon::now();
            $users->save();
            Session::put('message', 'You have Successfully Verified');
            return redirect()->route('login');
        } else {
            Session::put('message', 'You have already verified or verification link Expired');
            return redirect()->route('login');
        }
    }
}
