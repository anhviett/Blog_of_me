<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        $post_categories = PostCategory::all();
        return view('admin.posts.index', compact('posts', 'post_categories'));
    }
    public function create(){
        $posts = Post::all();
        $html = getPostCategory($parent_id = 0);
        return view('admin.posts.create', compact('posts', 'html'));
    }
    public function store(Request $request){
        $posts = new Post();
        if($request->hasFile('inputAvatar')){                ;
            $img_path = saveFile($request->file('inputAvatar'), 'image_posts/' . date('Y/m/d'));
            $posts->image = $img_path;
        }
        $posts->title = $request->input('inputTitle');
        $posts->name = $request->input('inputName');
        $posts->content = $request->input('inputContent');
        $posts->meta_keywords = $request->input('inputMetaKeywords');
        $posts->meta_desc = $request->input('inputMetaDesc');
        $posts->summary = $request->input('inputSummary');
        $posts->status = $request->input('inputStatus');
        $posts->post_id = $request->input('inputPosts');
        $posts->slug = $request->input('inputSlug');
        $posts->hours = Carbon::now('Asia/Ho_Chi_Minh')->hour. 'h ' . Carbon::now('Asia/Ho_Chi_Minh')->minute . 'min';
        $posts->days = Carbon::now('Asia/Ho_Chi_Minh')->month. ' moth, ' . Carbon::now('Asia/Ho_Chi_Minh')->year;

        $posts->save();
        if($posts){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $posts = Post::find($id);
        if($request->hasFile('inputAvatar')){                ;
            $img_path = saveFile($request->file('inputAvatar'), 'image_posts/' . date('Y/m/d'));
            $posts->image = $img_path;
        }
        $posts->title = $request->input('inputTitle');
        $posts->name = $request->input('inputName');
        $posts->content = $request->input('inputContent');
        $posts->meta_keywords = $request->input('inputMetaKeywords');
        $posts->meta_desc = $request->input('inputMetaDesc');
        $posts->status = $request->input('inputStatus');
        $posts->summary = $request->input('inputSummary');
        $posts->post_id = $request->input('inputPosts');
        $posts->slug = $request->input('inputSlug');
        $posts->hours = Carbon::now('Asia/Ho_Chi_Minh')->hour. 'h ' . Carbon::now('Asia/Ho_Chi_Minh')->minute . 'min';
        $posts->days = Carbon::now('Asia/Ho_Chi_Minh')->month. ' moth, ' . Carbon::now('Asia/Ho_Chi_Minh')->year;

        $posts->save();
        if($posts){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){

        $posts = Post::find($id);
        $post_categories = PostCategory::all();
        $html = getPostCategory($parent_id = 0);
        return view('admin.posts.edit', compact('posts', 'html', 'post_categories'));

    }
    public function delete($id){
        Post::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function postChangeStatus(Request $request){
        $posts = Post::find($request->post_id);
        $posts->status = $request->status;
        $posts->save();
        return response()->json(['success'=>'Thành công.']);
    }
}
