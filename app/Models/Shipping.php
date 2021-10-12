<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table = 'tbl_shipping';
    public function customers(){
        return $this->belongsToMany(Customer::class, 'tbl_customer_shipping', 'shipping_id', 'customer_id');
    }
}
