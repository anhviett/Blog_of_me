<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'tbl_payment';
    public function customers()
    {
        return $this->belongsToMany(Customer::class,'tbl_order','payment_id', 'customer_id');
    }

}
