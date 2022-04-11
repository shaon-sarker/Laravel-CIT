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
                    @if (session('order'))
                        <div class="alert alert-danger">
                            {{ session('order') }}
                        </div>
                    @endif
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
                                    $product_id = 'product_id';
                                    $checkout_btn_show = true;
                                @endphp

                                @forelse($carts as $cart_detail)
                                    <tr>
                                        <td class="images"><img
                                                src="{{ asset('uploads/products') }}/{{ $cart_detail->relation_to_product_has_one->product_image }}"
                                                alt=""></td>

                                        <td class="product"><a
                                                href="single-product.html">{{ $cart_detail->relation_to_product_has_one->product_name }}
                                            </a>
                                            @if ($cart_detail->cart_amount > $cart_detail->relation_to_product_has_one->product_quantity)
                                                <span class="badge badge-warning">Stock out</span>
                                                @php
                                                    $checkout_btn_show = false;
                                                @endphp
                                            @endif
                                            <span class="badge badge-success"> In Stock
                                                {{ $cart_detail->relation_to_product_has_one->product_quantity }} </span>
                                        </td>

                                        <td class="ptice">
                                            ${{ $cart_detail->relation_to_product_has_one->product_price }}</td>

                                        <td class="quantity cart-plus-minus">
                                            <input type="text" name="cart_amount[{{ $cart_detail->id }}]"
                                                value="{{ $cart_detail->cart_amount }}" />
                                        </td>

                                        <td class="total">
                                            ${{ $cart_detail->relation_to_product_has_one->product_price * $cart_detail->cart_amount }}
                                        </td>
                                        <td class="remove"><i class="fa fa-times"></i></td>
                                    </tr>
                                    @php
                                        $total = $total + $cart_detail->relation_to_product_has_one->product_price * $cart_detail->cart_amount;
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="6">No Data SHow</td>
                                    </tr>
                                @endforelse
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
                        <input type="text" id="coupon_name" placeholder="Cupon Code">
                        <button type="button" id="coupon_btn">Apply Cupon</button>
                    </div>
                    @if (session('coupon_expried'))
                        <div class="alert alert-warning">
                            {{ session('coupon_expried') }}
                        </div>
                    @endif
                    @if (session('coupon_invalid'))
                        <div class="alert alert-warning">
                            {{ session('coupon_invalid') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                <div class="cart-total text-right">
                    <h3>Cart Totals</h3>
                    <ul>
                        <li><span class="pull-left">Total </span>{{ $total }}</li>
                        <li><span class="pull-left">Discount({{ $discount }})%</span>
                            {{ ($total / 100) * $discount }}
                        </li>
                        <li><span class="pull-left"> SubTotal </span>{{ $total - ($total / 100) * $discount }}</li>
                    </ul>
                    <h2>{{ $cart_detail->product_id }}</h2>

                    @php
                        session([
                            'total_from_cart' => $total,
                            'product_id' => $cart_detail->product_id,
                            'discount_from_cart' => ($total / 100) * $discount,
                        ]);
                    @endphp


                    @if ($checkout_btn_show)
                        <a href="{{ url('/checkout') }}">Proceed to Checkout</a>
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

@section('footer_script')
    <script>
        $('#coupon_btn').click(function() {
            var coupon_name = $('#coupon_name').val();
            var current_link = "{{ url('/details/cart') }}";
            var link_to_go = current_link + '/' + coupon_name;
            window.location.href = link_to_go;
        });
    </script>
@endsection
