<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Supplier;

class CategoryController extends Controller
{

    public function category_view($type){
        $products = Products::join('category', 'category.id', '=', 'products.category_id')
                            ->join('supplier', 'supplier.id', '=', 'products.supplier_id')
                            ->where('category.value', '=', $type)
                            ->select('products.*', 'supplier.value')
                            ->get();
        $categories = $products->pluck('supplier.value')->unique()->toArray();
        return view('category', ['type' => $type, 'products' => $products, 'categories' => $categories]);
    }

}
