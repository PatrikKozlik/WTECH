<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function product_view($value){
        $product = Products::where('id', '=', $value)->first();
        $recomend = Products::whereNotIn('id', [$value])->inRandomOrder()->limit(3)->get();
        return view('product', ['product' => $product, 'recomend' => $recomend]);
    }
}
