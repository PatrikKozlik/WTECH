<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsListController extends Controller
{
    public function product_list_view(){
        return view('products_list');
    }

}
