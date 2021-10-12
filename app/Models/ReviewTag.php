<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewTag extends Model
{

    protected $table = 'tbl_review_tag';
    public function reviews(){
        return $this->belongsToMany(Review::class,'tbl_link_review_tag','tag_id','review_id');
    }
}
