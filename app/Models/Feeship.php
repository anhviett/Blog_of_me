<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    use HasFactory;
    protected $table = "tbl_feeship";
    public function city(){
        return $this->belongsTo(City::class, 'code_city');
    }
    public function district(){
        return $this->belongsTo(District::class, 'code_district');
    }
    public function wards(){
        return $this->belongsTo(Ward::class, 'code_wards');
    }
}
