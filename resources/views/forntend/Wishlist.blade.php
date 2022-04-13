@extends('forntend.master')
@section('content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Wishlist</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Wishlist</span></li>
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

                    {{-- <form> --}}
                    {{-- @csrf --}}
                    {{-- <input type="text" class="product_id " value="{{ $produst_wishlist->product_id }}"> --}}
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="stock">Stock Stutus </th>
                                {{-- <th class="quantity">Quantity</th> --}}
                                <th class="addcart">Add to Cart</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produst_wishlist as $wishlist)
                                <tr>
                                    <td class="images"><img
                                            src="{{ asset('uploads/products') }}/{{ $wishlist->relation_to_product->product_image }}"
                                            alt=""></td>
                                    <td class="product"><a
                                            href="single-product.html">{{ $wishlist->relation_to_product->product_name }}</a>
                                    </td>
                                    <td class="ptice">${{ $wishlist->relation_to_product->product_price }}
                                    </td>
                                    <td class="stock">In Stock</td>
                                    <td>
                                        <form action="{{ url('/addcart/wishlist') }}/{{ $wishlist->relation_to_product->id }}"
                                        method="POST">
                                        @csrf
                                        {{-- <input type="hidden" name="cart_amount"
                                                value="{{ $wishlist->relation_to_product->product_quantity }}"> --}}
                                        <span class="addcart">
                                            <button type="submit" class="btn btn-danger">Add to Cart</button>
                                        </span>

                                        </form>
                                    </td>
                                    {{-- <td>
                                            <a href="{{ url('/addto/cart') }}/{{ $wishlist->relation_to_product->id }}">add
                                                to cart</a>
                                        </td> --}}


                                    <td class="remove"><i class="fa fa-times"></i></td>
                                </tr>
                            @empty
                                {{-- <tr>
                                        <td colspan="6">No Data SHow</td>
                                    </tr> --}}
                            @endforelse
                        </tbody>
                    </table>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection
@section('footer_script')
    {{-- <script>
        $(document).ready(function() {
            $('.addWishlist').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty_input').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "",
                    data: {
                        'product_id': product_id,
                        // 'product_qty': product_qty,
                    },
                    success: function(response) {
                        swal(response.status);
                    }

                });
            });
        })
    </script> --}}
@endsection
