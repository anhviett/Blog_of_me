<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyCustomer extends Model
{
    use HasFactory;
    protected $table = 'tbl_verify_customers';
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
