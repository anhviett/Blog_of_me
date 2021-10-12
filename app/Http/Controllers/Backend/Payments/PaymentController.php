<?php

namespace App\Http\Controllers\Backend\Payments;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }
    public function create(){
        $payments = Payment::all();
        return view('admin.payments.create', compact('payments'));
    }
    public function store(Request $request){
        $payments = new Payment();
        $payments->payment_method = $request->input('inputName');
        $payments->save();
        $payments->customers()->sync($request->customers);
        if($payments){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $payments = Payment::find($id);
        $payments->Payment_name = $request->input('inputName');


        $payments->save();
        $payments->customers()->sync($request->customers);
        if($payments){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $payments =  Payment::all()->find($id);
        return view('admin.payments.edit', compact('payments'));

    }
    public function delete($id){
        Payment::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function paymentChangeStatus(Request $request){
        $payments = Payment::find($request->payment_id);
        $payments->status = $request->status;
        $payments->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
