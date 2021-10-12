<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();

        return view('admin.orders.customers.index', compact('customers'));
    }
    public function create(){
        $customers = Customer::all();
        return view('admin.orders.customers.create', compact('customers'));
    }
    public function store(Request $request){
        $customers = new Customer();
        $customers->customer_name = $request->input('inputName');
        $customers->customer_email = $request->input('inputEmail');
        $customers->customer_phone = $request->input('inputPhone');
        $customers->customer_password = md5($request->input('inputPassword'));
        $customers->save();
        if($customers){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $customers = Customer::find($id);
        $customers->customer_name = $request->input('inputName');
        $customers->customer_email = $request->input('inputEmail');
        $customers->customer_phone = $request->input('inputPhone');
        $customers->customer_password = md5($request->input('inputPassword'));

        $customers->save();
        if($customers){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $customers =  Customer::all()->find($id);
        return view('admin.orders.customers.edit', compact('customers'));

    }
    public function delete($id){
        Customer::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function customerChangeStatus(Request $request){
        $customers = Customer::find($request->customer_id);
        $customers->status = $request->status;
        $customers->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

}
