<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function product_view($value){
        $product = Products::where('id', '=', $value)->first();
        $recomend = Products::whereNotIn('id', [$value])->inRandomOrder()->limit(3)->get();
        $path = public_path('images/' . $value);
        if (File::isDirectory($path)) {
            $files_in_dir = File::files($path);
            //do not display first image
            $files_in_dir = array_slice($files_in_dir, 1);
            
        }
        else
        {
            $files = [];
        }        
        return view('product', ['product' => $product, 'recomend' => $recomend, 'files_in_dir' => $files_in_dir]);
    }
}
