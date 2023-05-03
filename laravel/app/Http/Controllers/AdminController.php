<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Supplier;
use Illuminate\Support\Facades\File;
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

            $path = public_path('images/' . $value);
            if (File::isDirectory($path)) {
                $files = File::files($path);
            }
            else
            {
                $files = [];
            }

            return view('admin_zone/admin_edit', ['product' => $product, 'categories' => $categories, 'suppliers' => $suppliers, 'files' => $files]);
        } 
        else
        {
            return redirect()->route('profile');
        }

    }

    public function admin_delete_file($value, $filename) {
        if(Auth::user()->role_id == 4)
        {
            File::delete(public_path('images/' . $value . '/' . $filename));
            return redirect()->route('admin_edit', ['value' => $value]);
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

            $files = $request->file('files');

            if (!empty($files)) {
                $folderpath = public_path('images/' . $request->id);
                File::ensureDirectoryExists($folderpath); // create if does not exists

                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    // $file->store();
                    $file->move($folderpath, $filename);
                }
            }

            return redirect()->route('admin');
        }
        else
        {
            return redirect()->route('profile');
        }
    }

    public function admin_create_product_view() {
        if(Auth::user()->role_id == 4) {
            $categories = Category::all();
            $suppliers = Supplier::all();
            return view('admin_zone/admin_create', ['categories' => $categories, 'suppliers' => $suppliers]);
        }
        else
        {
            return redirect()->route('profile');
        }
    }

    public function admin_create_product_save(Request $request) {
        if(Auth::user()->role_id == 4) {
            $product = new Products;

            $product->product_name = $request->product_name;
            $product->price = $request->price;
            $product->number_of_products = $request->number_of_products;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->details = $request->description;
            $product->available = $request->boolean('available');

            $product->save();

            $folderpath = public_path('images/' . $product->id);
            File::ensureDirectoryExists($folderpath); // create if does not exists

            $files = $request->file('files');

            if (!empty($files)) {
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    // $file->store();
                    $file->move($folderpath, $filename);
                }
            }

            return redirect()->route('admin');
        }
        else
        {
            return redirect()->route('profile');
        }
    }

    public function admin_delete_product($value) {
        if(Auth::user()->role_id == 4) {
            Products::destroy($value);
            
            File::deleteDirectory(public_path('images/' . $value));

            return redirect()->route('admin');
        }
        else
        {
            return redirect()->route('profile');
        }
    }

}
