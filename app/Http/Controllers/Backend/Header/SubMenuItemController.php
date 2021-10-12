<?php

namespace App\Http\Controllers\Backend\Header;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\SubMenuItem;
use Illuminate\Http\Request;

class SubMenuItemController extends Controller
{
    public function index(){
        $submenu_items = SubMenuItem::all();
        return view('admin.menu.submenu_items.index', compact('submenu_items'));
    }
    public function create(){
        $submenu_items = SubMenuItem::all();
        $menu_items = MenuItem::all();
        return view('admin.menu.submenu_items.create', compact('submenu_items','menu_items'));
    }
    public function store(Request $request){
        $submenu_items = new SubMenuItem();
        $submenu_items->name = $request->input('inputName');
        $submenu_items->link = $request->input('inputLink');
        $submenu_items->menu_item_id = $request->submenu_item_id;
        $submenu_items->save();

        if($submenu_items){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $submenu_items = SubMenuItem::find($id);
        $submenu_items->name = $request->input('inputName');
        $submenu_items->link = $request->input('inputLink');
        $submenu_items->menu_item_id = $request->submenu_item_id;

        $submenu_items->save();
        if($submenu_items){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $menu_items = SubMenuItem::all();
        $submenu_items =  SubMenuItem::all()->find($id);
        return view('admin.menu.submenu_items.edit', compact('submenu_items', 'menu_items'));

    }
    public function delete($id){
        SubMenuItem::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

    public function submenu_itemChangeStatus(Request $request){
        $submenu_items = SubMenuItem::find($request->submenu_item_id);
        $submenu_items->status = $request->status;
        $submenu_items->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
