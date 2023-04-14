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
        return view('category', ['type' => $type, 'products' => $products, 'categories' => $categories, 'request' => null]);
    }

    public function category_filter($type, Request $request){
        $categories = Products::join('category', 'category.id', '=', 'products.category_id')
                            ->join('supplier', 'supplier.id', '=', 'products.supplier_id')
                            ->where('category.value', '=', $type)
                            ->pluck('supplier.value')
                            ->unique()
                            ->toArray();
        
        $products = Products::query()
                            ->join('category', 'category.id', '=', 'products.category_id')
                            ->join('supplier', 'supplier.id', '=', 'products.supplier_id')
                            ->where('category.value', '=', $type);
        
        if($request->filled('low_price')){
            $products->where('price', '>=', $request->low_price);
        }
        if($request->filled('high_price')){
            $products->where('price', '<=', $request->high_price);
        }
        $selectedSuppliers = $request->input('supplier');
        if(!empty($selectedSuppliers)){
            $products->whereIn('supplier.value', $selectedSuppliers);
        }
        $selectedAvailable = $request->input('available');
        if(!empty($selectedAvailable)){
            $products->whereIn('available', $selectedAvailable);
        }
        if($request->order == 'expensive'){
            $products->orderBy('price', 'desc');
        }
        if($request->order == 'cheap'){
            $products->orderBy('price', 'asc');
        }

        $products = $products->select('products.*')->get();
        return view('category', ['type' => $type, 'products' => $products, 'categories' => $categories, 'request' => $request]);
    }

}
