<?php

namespace App\Http\Controllers\Backend\Reviews;

use App\Http\Controllers\Controller;
use App\Models\ReviewTag;
use Illuminate\Http\Request;

class ReviewTagController extends Controller
{

    public function index(){
            $review_tags = ReviewTag::all();
            return view('admin.products.reviews.review_tags.index', compact('review_tags'));
        }

        public function create(){
            $review_tags = ReviewTag::all();
            return view('admin.products.reviews.review_tags.create', compact('review_tags'));
        }
        public function store(Request $request){
            $review_tags = new ReviewTag();
            $review_tags->name = $request->input('inputName');

            $review_tags->save();
            if($review_tags){
                return back()->with('success', 'Thêm thành công');
            }else{
                return back()->with('error', 'Thêm thất bại');
            }
        }
        public function update(Request $request, $id){
            $review_tags = ReviewTag::find($id);
            $review_tags->name = $request->input('inputName');

            $review_tags->save();
            if($review_tags){
                return back()->with('success', 'Sửa thành công');
            }else{
                return back()->with('error', 'Sửa thất bại');
            }
        }
        public function edit($id){
            $review_tags =  ReviewTag::all()->find($id);
            return view('admin.products.reviews.review_tags.edit', compact('review_tags'));

        }
        public function delete($id){
            ReviewTag::destroy($id);
            return back()->with('success','Dữ liệu xóa thành công.');

        }
        public function review_tagChangeStatus(Request $request){
            $review_tags = ReviewTag::find($request->review_tag_id);
            $review_tags->status = $request->status;
            $review_tags->save();
            return response()->json(['success'=>'Status change successfully.']);
        }
}
