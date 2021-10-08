<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function coupon()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index', compact('coupons'));
    }

    function insert(Request $request)
    {
        // print_r($request->all());
        Coupon::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        return back()->with('coupon', 'Coupon add');
    }
}
