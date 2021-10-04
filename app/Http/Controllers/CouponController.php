<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    function coupon()
    {
        return view('admin.coupon.index');
    }
}
