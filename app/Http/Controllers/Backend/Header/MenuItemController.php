<?php

namespace App\Http\Controllers\Backend\Header;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index(){
        $menu_items = MenuItem::all();
        return view('admin.menu.menu_items.index', compact('menu_items'));
    }
    public function create(){
        $menu_items = MenuItem::all();
        return view('admin.menu.menu_items.create', compact('menu_items'));
    }
    public function store(Request $request){
        $menu_items = new MenuItem();
        $menu_items->name = $request->input('inputName');
        $menu_items->link = $request->input('inputLink');

        $menu_items->save();

        if($menu_items){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $menu_items = MenuItem::find($id);
        $menu_items->name = $request->input('inputName');
        $menu_items->link = $request->input('inputLink');

        $menu_items->save();
        if($menu_items){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $menu_items =  MenuItem::all()->find($id);
        return view('admin.menu.menu_items.edit', compact('menu_items'));

    }
    public function delete($id){
        MenuItem::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

    public function menu_itemChangeStatus(Request $request){
        $menu_items = MenuItem::find($request->menu_item_id);
        $menu_items->status = $request->status;
        $menu_items->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
