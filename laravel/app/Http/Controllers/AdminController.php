<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_view() {
        
        if(Auth::user()->role_id == 4)
        {
            $products = Products::all();
            return view('admin_zone/admin_zone', ['products' => $products]);
        } 
        else
        {
            return redirect()->route('profile');
        }


    }

    public function admin_edit_view($value) {
        if(Auth::user()->role_id == 4)
        {
            $product = Products::where('id', '=', $value)->first();
            $categories = Category::all();
            $suppliers = Supplier::all();
            return view('admin_zone/admin_edit', ['product' => $product, 'categories' => $categories, 'suppliers' => $suppliers]);
        } 
        else
        {
            return redirect()->route('profile');
        }

    }

    public function admin_edit_save(Request $request) {
        if(Auth::user()->role_id == 4) {
            $product = Products::find($request->id);

            $product->product_name = $request->product_name;
            $product->price = $request->price;
            $product->number_of_products = $request->number_of_products;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->details = $request->description;
            $product->available = $request->boolean('available');

            $product->save();

            return redirect()->route('admin');
        }
        else
        {
            return redirect()->route('profile');
        }
    }


}
