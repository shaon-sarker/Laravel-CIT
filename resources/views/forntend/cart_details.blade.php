@extends('forntend.master')
@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shopping Cart</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ url('/cart/update') }}" method="POST">
                    @csrf
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            $checkout_btn_show = true;
                            @endphp

                            @foreach($carts as $cart_detail )
                            <tr>
                                <td class="images"><img src="{{ asset('uploads/products') }}/{{ App\Models\Product::find($cart_detail->product_id)->product_image }}" alt=""></td>

                                <td class="product"><a href="single-product.html">{{App\Models\Product::find($cart_detail->product_id)->product_name}}
                                </a>
                                @if ($cart_detail->cart_amount > App\Models\Product::find($cart_detail->product_id)->product_quantity)
                                <span class="badge badge-warning">Stock out</span>
                                @php
                                    $checkout_btn_show = false;
                                @endphp
                                @endif
                                <span class="badge badge-success"> In Stock {{App\Models\Product::find($cart_detail->product_id)->product_quantity}} </span>
                            </td>

                                <td class="ptice">${{App\Models\Product::find($cart_detail->product_id)->product_price}}</td>

                                <td class="quantity cart-plus-minus">
                                    <input type="text" name="cart_amount[{{ $cart_detail->id }}]" value="{{ $cart_detail->cart_amount }}" />
                                </td>

                                <td class="total">${{App\Models\Product::find($cart_detail->product_id)->product_price * $cart_detail->cart_amount}}</td>
                                <td class="remove"><i class="fa fa-times"></i></td>
                            </tr>
                            @php
                                $total = $total + (App\Models\Product::find($cart_detail->product_id)->product_price * $cart_detail->cart_amount);
                            @endphp
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li>
                                        <button type="submit ">Update Cart</button>
                                    </li>
                </form>
                                    <li><a href="shop.html">Continue Shopping</a></li>
                                </ul>
                                <h3>Cupon</h3>
                                <p>Enter Your Cupon Code if You Have One</p>
                                <div class="cupon-wrap">
                                    <input type="text" placeholder="Cupon Code">
                                    <button>Apply Cupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li><span class="pull-left">Total </span>${{ $total }}</li>
                                    <li><span class="pull-left">Discount </span>100</li>
                                    <li><span class="pull-left"> SubTotal </span> $380.00</li>
                                </ul>
                                @if ($checkout_btn_show)
                                 <a href="checkout.html">Proceed to Checkout</a>
                                @else
                               <div class="alert alert-info">
                                product nai
                               </div>
                                @endif
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->
<!-- start social-newsletter-section -->
@endsection
