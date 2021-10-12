<?php

namespace App\Http\Controllers\Backend\Products;

use App\Components\CategoriesRecursive;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller

{
    public function index(){
        $product_categories = ProductCategory::orderBy('id', 'ASC')->paginate(5);
        return view('admin.products.product_category.index', compact('product_categories'));
    }



    public function create(){
        $html = getProductCategory($parent_id=0);
        $product_categories = ProductCategory::all();
        return view('admin.products.product_category.create', compact('product_categories', 'html'));
    }

    public function store(Request $request){
        $product_categories = new ProductCategory();
        $product_categories->name = $request->input('inputName');
        $product_categories->description = $request->input('inputDescription');
        $product_categories->meta_keywords = $request->input('inputMeta');
        $product_categories->status = $request->input('inputStatus');
        $product_categories->parent_id = $request->inputParentCategories;
        $product_categories->slug = Str::slug($product_categories->name, '-');
        $product_categories->save();

        if($product_categories){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $product_categories = ProductCategory::find($id);
        $product_categories->name = $request->input('inputName');
        $product_categories->description = $request->input('inputDescription');
        $product_categories->meta_keywords = $request->input('inputMeta');
        $product_categories->slug = Str::slug($product_categories->name, '-');
        $product_categories->save();
        if($product_categories){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){

        $product_categories =  ProductCategory::find($id);

        return view('admin.products.product_category.edit', compact('product_categories'));

    }
    public function delete($id){
        ProductCategory::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

    public function product_categoryChangeStatus(Request $request){
        $product_categories = ProductCategory::find($request->product_category_id);

        $product_categories->status = $request->status;
        $product_categories->save();
        return response()->json(['success'=>'Status change successfully.']);
    }


}
