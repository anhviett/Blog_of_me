<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{
    public function index(){
        $post_categories = PostCategory::orderBy('id', 'DESC')->paginate(5);
        return view('admin.posts.post_category.index', compact('post_categories'));
    }
    public function create(){
        $post_categories = PostCategory::all();
        return view('admin.posts.post_category.create', compact('post_categories'));
    }
    public function store(Request $request){
        $post_categories = new PostCategory();
        $post_categories->name = $request->input('inputName');
        $post_categories->status = $request->input('inputStatus');
        $post_categories->description = $request->input('inputDescription');
        $post_categories->meta_keywords = $request->input('inputMeta');
        $post_categories->slug = Str::slug($post_categories->name, '-');
        $post_categories->save();
        if($post_categories){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $post_categories = PostCategory::find($id);
        $post_categories->name = $request->input('inputName');
        $post_categories->status = $request->input('inputStatus');
        $post_categories->description = $request->input('inputDescription');
        $post_categories->meta_keywords = $request->input('inputMeta');
        $post_categories->slug = Str::slug($post_categories->name, '-');
        $post_categories->save();
        if($post_categories){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $post_categories =  PostCategory::all()->find($id);
        return view('admin.posts.post_category.edit', compact('post_categories'));

    }
    public function delete($id){
        PostCategory::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function post_categoryChangeStatus(Request $request){
        $post_categories = PostCategory::find($request->post_category_id);
        $post_categories->status = $request->status;
        $post_categories->save();
        return response()->json(['success'=>'Thành công.']);
    }

}
