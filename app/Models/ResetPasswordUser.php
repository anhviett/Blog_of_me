<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPasswordUser extends Model
{
    use HasFactory;
    protected $table = 'tbl_password_resets';
    public function user(){
        return $this->hasOne(User::class);
    }
}
