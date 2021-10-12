<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;


class ShopController extends Controller
{
    public function index(Request $request, $slug){


        $products = Product::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $menu_items = MenuItem::all();
        $category = ProductCategory::where('slug', $slug)->first();
        $paginateProducts = Product::where('category_id', $category->id)->get();

        if (!is_object($category)) {
            abort(404);
        }
        $brands = Brand::all();
        $paginateProducts = Product::orderBy('id', 'DESC')->paginate(3);
        foreach ($paginateProducts as $key => $value){
            $meta_desc = $value->description;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->name;
            $meta_canonical = $request->url();
        }
        return view('site.shop.products.index', compact('menu_items', 'category','brands',
            'paginateProducts', 'product_categories', 'categoriesLimit', 'products',
            'meta_canonical','meta_title', 'meta_keywords', 'meta_desc'));
    }
}
