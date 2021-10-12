<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = "tbl_reviews";
    public function tags(){
        return $this->belongsToMany(ReviewTag::class,'tbl_link_review_tag','review_id','tag_id');
    }
}
