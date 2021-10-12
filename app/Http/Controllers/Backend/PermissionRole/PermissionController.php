<?php

namespace App\Http\Controllers\Backend\PermissionRole;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function create()
    {

        return view('admin.permissions.create');
    }
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->input('module_parent');
        $permission->display_name = $request->input('module_parent');
        $permission->parent_id = 0;

        $permission->save();
        foreach ($request->moduleChildren as $children) {
            Permission::create([
                'name' => $children,
                'display_name' => $children,
                'parent_id' => $permission->id,
                'description' => $request->module_parent . '_' . $children
            ]);

        }
        return back()->with('success', 'Thanh cong');
    }
    public function edit($id){
        $permission = Permission::find($id);
        return view('admin.permissions.edit', compact('permission'));
    }
    public function update(Request $request,$id){
        $permission = Permission::find($id);
        $permission->name = $request->input('module_parent');
        $permission->display_name = $request->input('module_parent');
        $permission->parent_id = 0;
        $permission->save();
        foreach ($request->moduleChildren as $children) {

            /* $permission = new Permission();
             $permission->name = $children;
             $permission->display_name = $children;
             $permission->parent_id = $permission->id;
             $permission->description =  $request->module_parent . '_' . $children;
                     $permission->save();*/
            $permission->update([
                'name' => $children,
                'display_name' => $children,
                'parent_id' => $permission->id,
                'description' => $request->module_parent . '_' . $children
            ]);

        }
        return back()->with('success', 'Thêm thành công');
    }
}
