<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Support\Carbon;

class WishlistController extends Controller
{
    public function wishlist($product_id)
    {
        if (Cookie::get('generated_cart_id')) {
            $random_generated_id = Cookie::get('generated_cart_id');
        } else {
            $random_generated_id = rand(
                5000,
                59999
            ) . time();
            Cookie::queue('generated_cart_id', $random_generated_id, 600);
        }
        Wishlist::insert([
            // 'generated_cart_id' => $random_generated_id,
            // 'product_id' => $request->product_id,
            // 'product_name' => $request->product_name,
            // 'productprice' => $request->productprice,
            // 'productquantity' => $request->productquantity,
            // 'created_at' => Carbon::now(),

            'generated_cart_id' => $random_generated_id,
            'product_id' => $product_id,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
}
