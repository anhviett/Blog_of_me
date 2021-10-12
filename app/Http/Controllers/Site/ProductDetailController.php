<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index(Request $request,$id){
        $product = Product::find($id);
        $products = Product::all();
        $products_images = ProductImage::where('product_id', $product->id)->get();
        $related_product = Product::where('category_id', $product->category_id)->whereNotIn('id', [$product->id])->get();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $menu_items = MenuItem::all();
        foreach ($product_categories as $key => $value){
            $meta_desc = $value->description;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->name;
            $meta_canonical = $request->url();

        }
        return view('site.shop.products.product-detail.product-details',compact('categoriesLimit', 'products', 'product_categories','products_images',
            'brands','product', 'menu_items', 'meta_desc', 'meta_keywords',
            'meta_title', 'meta_canonical'))
            ->with('relate', $related_product);
    }
    public function show(Request $request){
        $products = Product::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();

        $brands = Brand::all();
        $menu_items = MenuItem::all();


        return view('site.shop.products.product-detail.show', compact('menu_items', 'products', 'product_categories',
            'categoriesLimit', 'brands'));
    }
}
