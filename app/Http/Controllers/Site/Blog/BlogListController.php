<?php

namespace App\Http\Controllers\Site\Blog;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    public function index(Request $request, $slug){
        $menu_items = MenuItem::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $sliders = Slider::all();
        $products = Product::all();
        $post_categories = PostCategory::orderBy('id', 'DESC')->get();
        $post_category = PostCategory::where('slug', $slug)->take(1)->get();

        foreach ($post_category as $post){
            //Seo
            $meta_desc = $post->meta_desc;
            $meta_keywords = $post->meta_keywords;
            $meta_title = $post->name;
            $id = $post->id;
            $meta_canonical = $request->url();
            //End Seo
        }

        $posts = Post::where('post_id', $id)->paginate(2);

        return view('site.blog-list.index', compact('menu_items','sliders',
            'product_categories', 'brands','post_categories','meta_desc','meta_keywords','meta_title','meta_canonical',
            'products', 'posts','post_category'));
    }
}
