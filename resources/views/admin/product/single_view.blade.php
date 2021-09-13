@extends('layouts.dashboad')
@section('product')
active
@endsection
@section('content')
@include('layouts.nav')
@endsection
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
      <span class="breadcrumb-item active">Blank Page</span>
    </nav>
    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ asset('uploads/products') }}/{{ $product_single_view->product_image }}" class="rounded" alt="product_images">
                </div>
                <div class="col-lg-6 mt-5">
                    <table class="table table-striped">
                        <tr>
                            <td>Product Name:</td>
                            <td>{{ $product_single_view->product_name }}</td>
                        </tr>
                        <tr>
                            <td>Product Price:</td>
                            <td>{{ $product_single_view->product_price }}</td>
                        </tr>
                        <tr>
                            <td>Product Description:</td>
                            <td>{{ $product_single_view->product_description }}</td>
                        </tr>
                        <tr>
                            <td>Product Quantity:</td>
                            <td>{{ $product_single_view->product_quantity }}</td>
                        </tr>
                        <tr>
                            <td>Product Category:</td>
                            <td>{{ App\Models\Category::find($product_single_view->category_id)->category_name }}</td>
                        </tr>
                        <tr>
                            <td>Product Subcategory:</td>
                            <td>{{ App\Models\Subcategory::find($product_single_view->subcategory_id)->subcategory_name  }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
