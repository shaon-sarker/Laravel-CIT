<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Country;
use App\Models\Orde_Product_Detail;
use App\Models\Order;
use App\Models\order_billing_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Support\Facades\Auth;

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

    function cartdetails($coupon_name = '')
    {
        if ($coupon_name == '') {
            $discount = 0;
        } else {
            if (Coupon::where('coupon_name', $coupon_name)->exists()) {
                if (Carbon::now()->format('Y-d-m') < Coupon::where('coupon_name', $coupon_name)->first()->coupon_validate) {
                    // echo 'date sesh';
                    return back()->with('coupon_expried', 'Coupon Expried');
                } else {
                    $discount = Coupon::where('coupon_name', $coupon_name)->first()->coupon_parcentage;
                }
            } else {
                // echo 'nai';
                return back()->with('coupon_invalid', 'Coupon Invalid');
            }
        }
        $carts = Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->get();
        return view('forntend.cart_details', compact('carts', 'discount'));
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


    function checkout()
    {
        $countrys = Country::select('id', 'name')->get();
        return view('forntend.checkout', compact('countrys'));
    }

    function getcitylist(Request $request)
    {
        $cities =  City::where('country_id', $request->country_id)->get();
        $str_to_send = "<option value=''>--Select city--</option>";
        foreach ($cities as $cityname) {
            $str_to_send .= "<option value='" . $cityname->id . "'>" . $cityname->name . "</option>";
        }
        echo  $str_to_send;
    }

    function order(Request $request)
    {
        if ($request->payment_method == 1 || $request->payment_method == 2) {
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                // 'product_id' => session('product_id'),
                // 'product_quantity' => 10,
                'phone_no' => $request->phone_no,
                'total' => session('total_from_cart'),
                'discount' => session('discount_from_cart'),
                'sub_total' => session('total_from_cart') - session('discount_from_cart'),
                'payment_method' => $request->payment_method,
                'created_at' => Carbon::now(),
            ]);

            // echo 'order hoise';
            order_billing_detail::insert([
                'order_id' => $order_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'postcode' => $request->postcode,
                'notes' => $request->notes,
                'created_at' => Carbon::now(),
            ]);
            $carts = Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->get();
            foreach ($carts as $cart_item) {
                $product_name = Product::find($cart_item->product_id)->product_name;
                $product_price = Product::find($cart_item->product_id)->product_price;
                Orde_Product_Detail::insert([
                    'order_id' => $order_id,
                    // 'product_id' => 7,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_quantity' => $cart_item->cart_amount,
                    'created_at' => Carbon::now(),
                ]);
                Product::find($cart_item->product_id)->decrement('product_quantity', $cart_item->cart_amount);
            }


            if ($request->payment_method == 1) {
                Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->delete();
            } else {
                return redirect('/online/payment');
            }

            return redirect('/details/cart')->with('order', 'order Success');
        } else {
            return back()->with('payment', 'payment method select');
        }
        // echo 'hoise';
    }
}
