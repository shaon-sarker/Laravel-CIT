@extends('forntend.master');
@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
@auth
@if (Auth::user()->role == 2)
    <!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="http://themepresss.com/tf/html/tohoney/checkout">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <p>First Name *</p>
                                <input type="text" value="{{ Auth::user()->name }}" name="name">
                            </div>
                            {{-- <div class="col-sm-6 col-12">
                                <p>Last Name *</p>
                                <input type="text">
                            </div> --}}
                            {{-- <div class="col-12">
                                <p>Compani Name</p>
                                <input type="text">
                            </div> --}}
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="email" value="{{ Auth::user()->email }}" name="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input type="text" name="phone">
                            </div>
                            <div class="col-6">
                                <p>Country *</p>
                                <select class="js-example-basic-single" name="country_id" id="select_country">
                                    <option value="">--Select Coountry--</option>
                                    @foreach ($countrys as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Town/City *</p>
                                <select class="js-example-basic-single" name="city_id" id="city_select">
                                    <option value="">--Select City---</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <p>Your Address *</p>
                                <input type="text" name="address">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Postcode/ZIP</p>
                                <input type="text" name="zipcode">
                            </div>
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="notes" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        <li>Pure Nature Honey <span class="pull-right">$139.00</span></li>
                        <li>Your Product Name <span class="pull-right">$100.00</span></li>
                        <li>Pure Nature Honey <span class="pull-right">$141.00</span></li>
                        <li>Subtotal <span class="pull-right"><strong>$380.00</strong></span></li>
                        <li>Shipping <span class="pull-right">Free</span></li>
                        <li>Total<span class="pull-right">$380.00</span></li>
                    </ul>
                    <ul class="payment-method">
                        <li>
                            <input id="bank" type="checkbox">
                            <label for="bank">Direct Bank Transfer</label>
                        </li>
                        <li>
                            <input id="paypal" type="checkbox">
                            <label for="paypal">Paypal</label>
                        </li>
                        <li>
                            <input id="card" type="checkbox">
                            <label for="card">Credit Card</label>
                        </li>
                        <li>
                            <input id="delivery" type="checkbox">
                            <label for="delivery">Cash on Delivery</label>
                        </li>
                    </ul>
                    <button>Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@else
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="my-5">
                <h3 class="alert alert-info">you are not customer-----> <a href="{{ url('/') }}">Go home</a></h1>
            </div>
        </div>
    </div>
</div>
@endif
@else
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="my-5">
                <h3 class="alert alert-info">Please-----> <a href="{{ url('/login') }}">login here</a></h1>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection

@section('footer_script')
{{-- In your Javascript (external .js resource or <script> tag) --}}
    <script>
  $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $('#select_country').change(function(){
        var country_id = $('#select_country').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/getcitylist',
            data:{country_id:country_id},
            success:function (data) {
                $('#city_select').html(data);
            }
        });



    })
    </script>



@endsection
