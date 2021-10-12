<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function index(){
        $styles = Style::all();
        return view('admin.products.style.index', compact('styles'));
    }
    public function create(){
        $styles = Style::all();
        return view('admin.products.style.create', compact('styles'));
    }
    public function store(Request $request){
        $styles = new style();
        $styles->name = $request->input('inputName');

        $styles->save();
        if($styles){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $styles = Style::find($id);
        $styles->name = $request->input('inputName');

        $styles->save();
        if($styles){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $styles =  Style::all()->find($id);
        return view('admin.products.style.edit', compact('styles'));

    }
    public function delete($id){
        Style::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function styleChangeStatus(Request $request){
        $styles = Style::find($request->style_id);
        $styles->status = $request->status;
        $styles->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

}
