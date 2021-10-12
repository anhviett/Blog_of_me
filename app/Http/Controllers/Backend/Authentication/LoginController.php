<?php


namespace App\Http\Controllers\Backend\Authentication;
use App\Http\Controllers\Controller;
use App\Models\Social; //sử dụng model Social
use Laravel\Socialite\Facades\Socialite; //sử dụng Socialite
use App\Models\Login; //sử dụng model Login

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{

    public function login_facebook(){

        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri
            $account_name = Login::where('id',$account->user)->first();
            Session::put('name',$account_name->name);
            Session::put('id',$account_name->id);
            return route('home.page')->with('success', 'Đăng nhập Admin thành công');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'name' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'password' => '',
                    'status' => 1

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('id',$account->user)->first();

            Session::put('name',$account_name->name);
            Session::put('id',$account_name->id);
            return route('home.page')->with('message', 'Đăng nhập Admin thành công');
        }
    }


    public function index()
    {
        session()->forget('email_resend');
        session()->forget('resent');
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $credential = $request->only('email', 'password');


        $remember = $request->has('remember_me') ? true : false;
        if ($remember){
            Cookie::queue('email', $request->email, 1440);
            Cookie::queue('password', $request->password, 1440);
        }
        if (auth()->attempt($credential, $remember)) {

            if (auth()->user()->email_verified_at === null) {
                auth()->logout();
                return redirect()->back()->with('error', 'Vui lòng kích hoạt tài khoản trước khi tiếp tục');
            }
            return redirect()->route('home.page');

        } else {
            return redirect()->back()->with('error', 'Đăng nhập thất bại');
        }
    }

    public function destroy()
    {
        Auth::logout();
        return view('admin.auth.login');
    }

}
