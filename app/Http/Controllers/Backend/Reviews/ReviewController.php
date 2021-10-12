<?php

namespace App\Http\Controllers\Backend\Reviews;

use App\Http\Controllers\Controller;
use App\Models\LinkReviewTag;
use App\Models\Review;
use App\Models\ReviewTag;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $tags = ReviewTag::all();
        $reviewTag = LinkReviewTag::all();
        $reviews = Review::all();
        return view('admin.products.reviews.index', compact('reviews', 'tags','reviewTag'));
    }

    public function create(){
        $reviews = Review::all();
        $tags = ReviewTag::all();
        return view('admin.products.reviews.create', compact('reviews', 'tags'));
    }
    public function store(Request $request){
        $reviews = new Review();
        $reviews->comment = $request->input('inputComment');
        $reviews->save();
        $reviews->tags()->sync($request->tags);

        if($reviews){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $reviews = Review::find($id);
        $reviews->comment = $request->input('inputComment');

        $reviews->save();
        $reviews->tags()->sync($request->tags);
        if($reviews){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $reviews =  Review::all()->find($id);
        $tags = ReviewTag::all();

        return view('admin.products.Review.edit', compact('reviews', 'tags'));

    }
    public function delete($id){
        Review::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function reviewChangeStatus(Request $request){
        $reviews = Review::find($request->Review_id);
        $reviews->status = $request->status;
        $reviews->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
