<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'tbl_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function verifyUser(){
        return $this->hasOne(VerifyUser::class);
    }

    public function resetPassword(){
        return $this->belongsTo(ResetPasswordUser::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class,'tbl_role_user','user_id','role_id');
    }

    public function checkPermissionAccess($permissionCheck){
        $roles = auth()->user()->roles;
        foreach ($roles as $role){
            $permissions = $role->permissions;
            if($permissions->contains('description',$permissionCheck)){
                return true;
            }
        }
        return false;
    }
}
