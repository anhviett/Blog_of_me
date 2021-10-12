<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    public $guarded = [];
    public $table = 'tbl_permissions';
    public function roles(){
        return $this->belongsToMany(Role::class,'tbl_permission_role','permission_id','role_id');
    }
    public function permissionChildren(){
        return $this->hasMany(Permission::class,'parent_id');
    }
}
