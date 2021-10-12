<?php


namespace App\Http\Controllers\Site\Auth;


use App\Http\Controllers\Controller;
use App\Mail\verifyEmailCustomer;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\VerifyCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class AuthenticationController extends Controller
{
    public function login_register(Request $request){
        //Seo
        $meta_desc = "Đăng nhập - Đăng ký";
        $meta_keywords = "Tài khoản của bạn";
        $meta_title = "Đăng nhập - Đăng k";
        $meta_canonical = $request->url();
        //End Seo
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $products = Product::all();
        $customers = Customer::all();
        $menu_items = MenuItem::all();
        return view('site.auth.login-register', compact('categoriesLimit', 'product_categories',
            'brands', 'products', 'customers', 'menu_items',
            'meta_desc', 'meta_keywords', 'meta_title', 'meta_canonical'
        ));

    }

    public function verifyEmailcustomer($token){
        $verified_customer = VerifyCustomer::where('token',$token)->first();
        if ($verified_customer){
            $customer = $verified_customer->customer;

            if (!$customer->email_verified_at){
                $customer->email_verified_at = Carbon::now();
                $customer->save();
                return redirect()->route('login_register')->with('success','Email kích hoạt thành công');
            }
            else{
                return redirect()->route('login_register')->with('error','Đã có sự cố xảy ra, vui lòng thử lại');
            }
        }
    }

    public function create(){
        return view('site.auth.verify');
    }

    public function resend(){
        Mail::to(session('email_resend'))->send(new verifyEmailCustomer(Customer::where('email', session('email_resend'))->first()));
        session()->put('resent', true);
        return redirect()->back();
    }

    public function logout(){
        Session::flush();
        return redirect()->route('home.index');
    }
}
