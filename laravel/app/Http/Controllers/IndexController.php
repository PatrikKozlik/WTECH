<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class IndexController extends Controller
{

    public function index_view(){
        $recomend = Products::inRandomOrder()->limit(3)->get();
        return view('index', ['recomend' => $recomend]);
    }

}
