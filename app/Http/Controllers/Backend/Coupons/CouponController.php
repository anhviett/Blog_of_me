<?php

namespace App\Http\Controllers\Backend\Coupons;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('admin.coupons.index', compact('coupons'));
    }
    public function create(){
        $coupons = Coupon::all();
        return view('admin.coupons.create', compact('coupons'));
    }
    public function store(Request $request){
        $coupons = new Coupon();
        $coupons->coupon_name = $request->input('inputName');
        $coupons->coupon_code = $request->input('inputCode');
        $coupons->coupon_number = $request->input('inputCountPrice');
        $coupons->coupon_condition = $request->input('inputCondition');
        $coupons->coupon_count = $request->input('inputCount');
        $coupons->save();
        if($coupons){
            return back()->with('success', 'Thêm mã giảm giá thành công');
        }else{
            return back()->with('error', 'Thêm mã giảm giá thất bại');
        }
    }
    public function edit($id){
        $coupons =  Coupon::all()->find($id);
        return view('admin.products.coupons.edit', compact('coupons'));

    }
    public function delete($id){
        Coupon::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function counponChangeStatus(Request $request){
        $coupons = Coupon::find($request->coupon_id);
        $coupons->status = $request->status;
        $coupons->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
