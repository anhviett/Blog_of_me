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

class BlogSingleController extends Controller
{
    public function index(Request $request, $slug){
        $menu_items = MenuItem::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $products = Product::all();
        $sliders = Slider::all();
        $post_categories = PostCategory::orderBy('id', 'DESC')->get();

        $paginatePost = Post::where('slug', $slug)->take(1)->get();
        foreach ($paginatePost as $key => $value){
            $meta_desc = $value->description;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->title;
            $id = $value->id;
            $post_id = $value->post_id;
            $meta_canonical = $request->url();
        }
        $related = Post::where('post_id', $post_id)->whereNotIn('slug', [$slug])->take(3)->get();
        $posts = Post::where('id', $id)->paginate(2);

        return view('site.blog-single.index', compact('menu_items','product_categories','brands',
            'products', 'meta_desc','meta_keywords','meta_title','meta_canonical', 'post_categories',
        'posts','sliders', 'related'
        ));
    }
    public function show($id){
        $menu_items = MenuItem::all();
        $product_categories = ProductCategory::where('parent_id', 0)->get();
        $brands = Brand::all();
        $products = Product::all();
        $posts = Post::find($id);
        return view('site.blog-single.index', compact('posts','menu_items','product_categories','brands', 'products'));
    }
}
