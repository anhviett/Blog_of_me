<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }
    public function create(){
        $sliders = Slider::all();

        return view('admin.sliders.create', compact('sliders'));
    }
    public function store(Request $request){

        $sliders = new Slider();

        if($request->hasFile('inputImageProduct')){
            $img_path = saveFile($request->file('inputImageProduct'), 'ImageProduct/' . date('Y/m/d'));
            $sliders->image_product = $img_path;

        }

        if($request->hasFile('inputImagePricing')){                ;
            $img_path = saveFile($request->file('inputImagePricing'), 'ImagePricing/' . date('Y/m/d'));
            $sliders->image_pricing = $img_path;
        }

        $sliders->title = $request->input('inputTitle');
        $sliders->content = $request->input('inputContent');

        $sliders->save();
        if($sliders){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $sliders = Slider::find($id);
        $sliders->name = $request->input('inputName');

        $sliders->save();
        if($sliders){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $sliders =  Slider::all()->find($id);
        return view('admin.sliders.edit', compact('sliders'));

    }
    public function delete($id){
        Slider::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function sliderChangeStatus(Request $request){
        $sliders = Slider::find($request->slider_id);
        $sliders->status = $request->status;
        $sliders->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
