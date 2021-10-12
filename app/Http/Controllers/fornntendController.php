<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class fornntendController extends Controller
{
    function welcome()
    {
        $category = Category::all();
        $products = Product::all();
        // $modal_product = Product::find($product_id);
        return view('forntend.index', compact('category', 'products'));
    }
    function product_detail($product_id)
    {
        $product_info = Product::find($product_id);
        return view('forntend.product_single', compact('product_info'));
    }
    function productshop()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('forntend.shop', compact('categories', 'products'));
    }
    function category_product($category_id)
    {
        $category_products = Product::where('category_id', $category_id)->get();
        $category_name = Category::find($category_id);
        return view('forntend.category_product', compact('category_products', 'category_name'));
    }
}
