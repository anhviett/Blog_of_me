<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index(){
        $order_details = OrderDetail::all();

        return view('admin.orders.order_details.index', compact('order_details'));
    }
    public function create(){
        $order_details = OrderDetail::all();
        return view('admin.orders.order_details.create', compact('order_details'));
    }
    public function store(Request $request){
        $order_details = new OrderDetail();
        $order_details->product_name = $request->input('inputName');
        $order_details->product_price = $request->input('inputPrice');
        $order_details->product_sales_quantity = $request->input('inputQuantity');

        $order_details->save();
        if($order_details){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $order_details = OrderDetail::find($id);
        $order_details->order_detail_name = $request->input('inputName');
        $order_details->order_detail_email = $request->input('inputEmail');
        $order_details->order_detail_phone = $request->input('inputPhone');
        $order_details->order_detail_password = md5($request->input('inputPassword'));

        $order_details->save();
        if($order_details){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $order_details =  OrderDetail::all()->find($id);
        return view('admin.orders.order_details.edit', compact('order_details'));

    }
    public function delete($id){
        OrderDetail::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function order_detailChangeStatus(Request $request){
        $order_details = OrderDetail::find($request->order_detail_id);
        $order_details->status = $request->status;
        $order_details->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
