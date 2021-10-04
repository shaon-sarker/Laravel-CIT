<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cookie;

class CartController extends Controller
{
    function cart(Request $request)
    {
        if (Cookie::get('generated_cart_id')) {
            $random_generated_id = Cookie::get('generated_cart_id');
        } else {
            $random_generated_id = rand(5000, 59999) . time();
            Cookie::queue('generated_cart_id', $random_generated_id, 500);
        }
        if (Cart::where('generated_cart_id', $random_generated_id)->where('product_id', $request->product_id)->increment('cart_amount', $request->cart_amount)) {
        } else {
            Cart::insert([
                'generated_cart_id' => $random_generated_id,
                'product_id' => $request->product_id,
                'cart_amount' => $request->cart_amount,
                'created_at' => Carbon::now(),
            ]);
        }


        return back();
    }

    function deletecart($cart_id)
    {
        Cart::find($cart_id)->delete();
        return back();
    }

    function cartdetails()
    {
        $carts = Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->get();
        return view('forntend.cart_details', compact('carts'));
    }
    function cartupdate(Request $request)
    {
        foreach ($request->cart_amount as $cart_id => $cart_amount) {
            Cart::find($cart_id)->update([
                'cart_amount' => $cart_amount,
            ]);
        }
        return back();
    }
}
