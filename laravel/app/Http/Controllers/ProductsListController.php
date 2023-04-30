<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product_user;

class ProductsListController extends Controller
{
    public function product_list_view(){


        $products = Product_user::select('p.id as id','p.product_name as name', 'product_user.order_code as order_code', 'p.price as price', 'product_user.number_of_products as amount', 'product_user.create_date as date')
                                ->join('products as p', 'p.id', '=', 'product_user.product_id')
                                ->where([
                                    ['product_user.user_id', '=', Auth::user()->id],
                                    
                                ])
                                ->get();

        return view('products_list', ['products' => $products]);
    }

}
