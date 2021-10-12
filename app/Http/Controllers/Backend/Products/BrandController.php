<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('admin.products.brand.index', compact('brands'));
    }
    public function create(){
        $brands = Brand::all();
        return view('admin.products.brand.create', compact('brands'));
    }
    public function store(Request $request){
        $brands = new Brand();
        $brands->name = $request->input('inputName');

        $brands->save();
        if($brands){
            return back()->with('success', 'Thêm thương hiệu thành công');
        }else{
              return back()->with('error', 'Thêm thương hiệu thất bại');
        }
    }
    public function update(Request $request, $id){
        $brands = Brand::find($id);
        $brands->name = $request->input('inputName');

        $brands->save();
        if($brands){
            return back()->with('success', 'Sửa thương hiệu thành công');
        }else{
            return back()->with('error', 'Sửa thương hiệu thất bại');
        }
    }
    public function edit($id){
        $brands =  Brand::all()->find($id);
        return view('admin.products.brand.edit', compact('brands'));

    }
    public function delete($id){
        Brand::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function brandChangeStatus(Request $request){
        $brands = Brand::find($request->brand_id);
        $brands->status = $request->status;
        $brands->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

}
