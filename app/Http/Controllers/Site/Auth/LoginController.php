<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\MenuItem;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(){
        $menu_items = MenuItem::all();
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        return view('site.auth.login', compact('categoriesLimit', 'menu_items'));
    }


    public function login_customer(Request $request){
        //validate

        //lay gia tri
        $post = $request->only('AccountEmail', 'AccountPassword');

        $credential = [
            'email' => $post['AccountEmail'],
            'password' => $post['AccountPassword'],
        ];


        if (auth('customer')->attempt($credential, false)) {
            if (Auth::guard('customer')->user()->email_verified_at === null) {
                return redirect()->back()->with('error','Vui lòng kích hoạt tài khoản trước khi tiếp tục');
            }
            $customer_id = Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : null;
            Session::put('customer_id', $customer_id);
            return redirect()->route('home.index');
        }else{
            return redirect()->route('login_register')->with('error', 'Đăng nhập thất bại !');
        }

//        $customers = Customer::all();
//        $customers->email = $request->input('AccountEmail');
//        $customers->password = md5($request->input('AccountPassword'));
//        $result = Customer::where('email', $customers->email)->where('password',$customers->password);
//
//
//        Session::put('id',$request->id);
//        if ($result){
//            return redirect()->route('checkout.index')->with('success','Đăng nhập thành công !');
//        }else{
//            return redirect()->route('login_register')->with('error', 'Đăng nhập thất bại !');
//        }
    }

}
