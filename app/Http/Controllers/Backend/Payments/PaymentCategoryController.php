<?php

namespace App\Http\Controllers\Backend\Payments;

use App\Http\Controllers\Controller;
use App\Models\PaymentCategory;
use Illuminate\Http\Request;

class PaymentCategoryController extends Controller
{
    public function index(){
        $payment_categories = PaymentCategory::all();

        return view('admin.payments.payment_categories.index', compact('payment_categories'));
    }
    public function create(){
        $payment_categories = PaymentCategory::all();
        return view('admin.payments.payment_categories.create', compact('payment_categories'));
    }
    public function store(Request $request){
        $payment_categories = new PaymentCategory();
        $payment_categories->name = $request->input('inputName');

        $payment_categories->save();
        if($payment_categories){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $payment_categories = PaymentCategory::find($id);
        $payment_categories->name = $request->input('inputName');

        $payment_categories->save();
        if($payment_categories){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $payment_categories =  PaymentCategory::all()->find($id);
        return view('admin.payments.payment_categories.edit', compact('payment_categories'));

    }
    public function delete($id){
        PaymentCategory::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function paymentChangeStatus(Request $request){
        $payment_categories = PaymentCategory::find($request->payment_category_id);
        $payment_categories->status = $request->status;
        $payment_categories->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
