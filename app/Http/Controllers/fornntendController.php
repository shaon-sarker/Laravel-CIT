<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomeSeo;
use App\Models\Orde_Product_Detail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class fornntendController extends Controller
{
    function welcome()
    {
        $category = Category::all();
        $products = Product::all();
        // $best_selleing = Product::all();
        // $best_selleing_products = Order::groupBy('product_id')
        //     ->selectRaw('sum(product_quantity) as sum')
        //     ->selectRaw('product_id')
        //     ->get();
        // echo  $best_selleing_products;
        $best_selleing_products = Product::where('best_selling', 'BestSellingProduct')->orderBy('id', 'DESC')->get();


        $homeseo = HomeSeo::all();

        SEOMeta::setTitle($homeseo[0]['title']);
        SEOMeta::setDescription($homeseo[0]['description']);
        SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        OpenGraph::setDescription($homeseo[0]['description']);
        OpenGraph::setTitle($homeseo[0]['title']);
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($homeseo[0]['title']);
        TwitterCard::setSite('@LuizVinicius73');

        JsonLd::setTitle($homeseo[0]['title']);
        JsonLd::setDescription($homeseo[0]['description']);
        JsonLd::addImage($homeseo[0]['page_image']);

        return view('forntend.index', compact('category', 'products', 'best_selleing_products'));
    }
    function aboutpage()
    {
        return view('forntend.about');
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
