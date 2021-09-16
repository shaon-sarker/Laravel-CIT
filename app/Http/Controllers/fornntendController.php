<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class fornntendController extends Controller
{
    function welcome(){
        $category = Category::all();
        $products = Product::all();
        return view('forntend.index',compact('category','products'));
    }
    function product_detail($product_id){
        $product_info = Product::find($product_id);
        return view('forntend.product_single', compact('product_info'));
    }
}
