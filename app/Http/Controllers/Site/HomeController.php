<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request){
        //Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
        //End Seo
        $products = Product::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $post = Post::all();
        $post_categories = PostCategory::orderBy('id', 'DESC')->get();
        $categoriesLimit = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $sliders = Slider::all();
        $menu_items = MenuItem::all();
        $recommend_items = Product::take(3)->get();
        $styles = Style::all();

        return view('site.home.index', compact('products','product_categories','categoriesLimit',
            'brands', 'sliders','styles','recommend_items','post', 'post_categories',
        'menu_items','meta_desc', 'meta_keywords', 'meta_title', 'meta_canonical'
        ));
    }
}
