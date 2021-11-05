<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
        $product_review = Order::all();
        return view('forntend.product_single', compact('product_info', 'product_review'));
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

    function review(Request $request)
    {
        // print_r($request->all());
        Order::where('user_id', Auth::id())->where('product_id', $request->product_id)->whereNull('review')->first()->update([
            'review' => $request->review,
            'start' => $request->start,
        ]);
        return back();
    }
}
