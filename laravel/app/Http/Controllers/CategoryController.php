<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Supplier;

class CategoryController extends Controller
{

    public function category_filter($type, Request $request){
        $page = 1;
        $products = Products::query();
        $categories = null;
        $request->validate([
            'low_price' => 'nullable|numeric|min:0',
            'high_price' => 'nullable|numeric|min:0',
            'page' => 'nullable|numeric|min:0',
        ]);
        if($request->filled('search')){
            $searchTerm = $request->input('search');
            $products->whereRaw('MATCH(product_name) AGAINST(?)', [$searchTerm]);
            $products->join('supplier', 'supplier.id', '=', 'products.supplier_id');
            $categories = $products->pluck('supplier.value')->unique()->toArray();
        }
        else{
            $products->join('category', 'category.id', '=', 'products.category_id')
                   ->join('supplier', 'supplier.id', '=', 'products.supplier_id')
                   ->where('category.value', '=', $type);
            $categories = Products::join('category', 'category.id', '=', 'products.category_id')
                   ->join('supplier', 'supplier.id', '=', 'products.supplier_id')
                   ->where('category.value', '=', $type)
                   ->pluck('supplier.value')
                   ->unique()
                   ->toArray();
        }
        
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
        if($request->page != null){
            $page = $request->page;
        }

        $count = $products->count();
        $move = [0,0, $page];
        if($count > $page * 9){
            $move[1] = 1;
        }
        if($page > 1){
            $move[0] = 1;
        } 
        $products = $products->offset(($page-1)*9)->limit(9)->select('products.*')->get();
        return view('category', ['type' => $type, 'products' => $products, 'categories' => $categories, 'request' => $request, 'move' => $move]);
    }

}
