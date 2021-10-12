<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'tbl_roles';
    public function users(){
        return $this->belongsToMany(User::class,'tbl_role_user','role_id','user_id');
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class,'tbl_permission_role','role_id','permission_id');
    }
}
