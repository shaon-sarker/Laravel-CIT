@extends('layouts.dashboad')
@section('product')
active
@endsection
@section('content')
@include('layouts.nav')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
      <span class="breadcrumb-item active">Blank Page</span>
    </nav>
    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Product</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-dark">
                                <th>SL</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                                <th>Product Quantity</th>
                                <th colspan="3">Action</th>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ App\Models\Category::find($product->category_id)->category_name }}</td>
                                            <td>{{ App\Models\Subcategory::find($product->subcategory_id)->subcategory_name }}</td>
                                            <td><img class="w-75" src="{{ asset('uploads/products') }}/{{ $product->product_image }}" alt=""></td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->product_description }}</td>
                                            <td>{{ $product->product_quantity }}</td>
                                            <td><a href="{{ url('/product/view') }}/{{ $product->id }}" class="btn btn-success">View</a></td>
                                            <td><a href="{{ url('/product/edit') }}/{{ $product->id }}" class="btn btn-info">Edit</a></td>
                                            <td><a href="" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
