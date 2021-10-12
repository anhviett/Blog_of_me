<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\Style;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products = Product::orderBy('category_id', 'DESC')->paginate(5);
        return view("admin.products.index",compact('products'));
    }


    public function create(){
        $products = Product::all();
        $brands = Brand::all();
        $styles = Style::all();
        $html = getProductCategory($parent_id = 0);
        return view("admin.products.create", compact('products', 'brands', 'html','styles'));


    }


    public function store(Request $request){
        $products = new Product();
        if($request->hasFile('avatar_product')){                ;
            $img_path = saveFile($request->file('avatar_product'), 'avatar_product/' . date('Y/m/d'));
            $products->inputAvatar = $img_path;
        }
        $products->name = $request->input('inputName');
        $products->description = $request->input('inputDescription');
        $products->price =$request->input('inputPrice');
        $products->content = $request->input('inputContent');
        $products->brand_id = $request->input('inputBrands');
        $products->style_id = $request->input('inputStyles');
        $products->status = $request->input('inputStatus');
        $products->category_id = $request->input('inputCategories');


        if ($request->hasFile('inputAvatar')){
            $image_src = saveFile($request->file('inputAvatar'), 'products/' . date('Y/m/d'));
            $products->avatar = $image_src;
        }
        $products->save();

        if ($request->hasFile('images')) {
            ProductImage::where('product_id', $products->id)->delete();
            foreach ($request->file('images') as $file) {
                $img_path = saveFile($file, 'products/' . date('Y/m/d'));
                $product_images = new ProductImage();
                $product_images->product_id = $products->id;
                $product_images->path = $img_path;
                $product_images->save();
            }
        } else {
            if ($request->get('delete_img') == 1) {
                ProductImage::where('product_id', $products->id)->delete();
            }
        }
        if ($products) {
            return back()->with('success', 'Tạo thành công');
        } else {
            return back()->with('error', 'Tạo thất bại');
        }

    }

    public function show($id){
    }

    public function update(Request $request,$id){
        $products = Product::find($id);
        if($request->hasFile('avatar_product')){                ;
            $img_path = saveFile($request->file('avatar_product'), 'avatar_product/' . date('Y/m/d'));
            $products->inputAvatar = $img_path;
        }
        $products->name = $request->input('inputName');
        $products->description = $request->input('inputDescription');
        $products->price =$request->input('inputPrice');
        $products->content = $request->input('inputContent');
        $products->brand_id = $request->input('inputBrands');
        $products->style_id = $request->input('inputStyles');
        $products->status = $request->input('inputStatus');
        $products->category_id = $request->input('inputCategories');
        if ($request->hasFile('inputAvatar')){
            $image_src = saveFile($request->file('inputAvatar'), 'products/' . date('Y/m/d'));
            $products->avatar = $image_src;
        }
        if ($request->hasFile('images')) {
            ProductImage::where('product_id', $products->id)->delete();
            foreach ($request->file('images') as $file) {
                $img_path = saveFile($file, 'products/' . date('Y/m/d'));
                $product_images = new ProductImage();
                $product_images->product_id = $products->id;
                $product_images->path = $img_path;
                $product_images->save();
            }
        } else {
            if ($request->get('delete_img') == 1) {
                ProductImage::where('product_id', $products->id)->delete();
            }
        }
        $products->save();

        if ($products) {

            return back()->with('success', 'Sửa thành công');
        } else {
            return back()->with('error', 'Sửa thất bại');
        }

    }

    public function edit($id)
    {
        $products = Product::find($id);
        $brands = Brand::all();
        $styles = Style::all();
        $html = getProductCategory($parent_id = 0);
        return view("admin.products.edit", compact('products',  'brands', 'html','styles'));
    }


    public function delete($id){
        Product::destroy($id);
        return back()->with('success', 'Xóa sản phẩm thành công');
    }
    public function productChangeStatus(Request $request){
        $products = Product::find($request->product_id);
        $products->status = $request->status;
        $products->save();
        return response()->json(['success'=>'Status change successfully.']);
    }



}
