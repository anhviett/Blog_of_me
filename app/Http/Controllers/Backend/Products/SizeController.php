<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller


{

    public function index(){
        $sizes = Size::all();
        return view('admin.products.sizes.index', compact('sizes'));
    }
    public function create(){
        $sizes = Size::all();
        return view('admin.products.sizes.create', compact('sizes'));
    }
    public function store(Request $request){
        $sizes = new Size();
        $sizes->name = $request->input('inputName');
        $sizes->status = $request->input('inputStatus');

        $sizes->save();

        if($sizes){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $sizes = Size::find($id);
        $sizes->name = $request->input('inputName');
        $sizes->status = $request->input('inputStatus');

        $sizes->save();
        if($sizes){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $sizes =  Size::all()->find($id);
        return view('admin.products.sizes.edit', compact('sizes'));

    }
    public function delete($id){
        Size::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

    public function sizeChangeStatus(Request $request){
        $sizes = Size::find($request->size_id);
        $sizes->status = $request->status;
        $sizes->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
