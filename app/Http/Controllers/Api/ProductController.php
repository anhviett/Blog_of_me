<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $r){

        $products = Product::whereRaw('1=1');
        if ($r->has('name') && $r->name != ''){
            $products = $products->where('name', 'like', '%'.$r->name. '%');
        }
        if ($r->has('category_id') && $r->category_id != ''){
            $products = $products->where('category_id', $r->category_id);
        }
        $products = $products->paginate(5);
        return response()->json([
           'status' => true,
           'msg' => 'Lay API thanh cong',
           'data' => $products
        ]);
    }
}
