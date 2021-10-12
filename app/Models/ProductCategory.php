<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table='tbl_product_categories';
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function categoryChildrents(){
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
}




