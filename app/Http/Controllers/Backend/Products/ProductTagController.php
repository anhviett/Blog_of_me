<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class ProductTagController extends Controller


{
    public function index(){
        $product_tags = ProductTag::all();
        return view('admin.products.product_tag.index', compact('product_tags'));
    }
    public function create(){
        $product_tags = ProductTag::all();
        return view('admin.products.product_tag.create', compact('product_tags'));
    }
    public function store(Request $request){
        $product_tags = new ProductTag();
        $product_tags->name = $request->input('inputName');
        $product_tags->description = $request->input('inputDescription');

        $product_tags->save();

        if($product_tags){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $product_tags = ProductTag::find($id);
        $product_tags->name = $request->input('inputName');
        $product_tags->description = $request->input('inputDescription');

        $product_tags->save();
        if($product_tags){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $product_tags =  ProductTag::all()->find($id);
        return view('admin.products.product_tag.edit', compact('product_tags'));

    }
    public function delete($id){
        ProductTag::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

    public function product_tagChangeStatus(Request $request){
        $product_tags = ProductTag::find($request->product_tag_id);
        $product_tags->status = $request->status;
        $product_tags->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
