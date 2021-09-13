@extends('layouts.dashboad')
@section('product')
active
@endsection
@section('content')
@include('layouts.nav')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
    </nav>
    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1>Products</h1>
                        </div>
                        <div class="card-body">
                            @if (session('update'))
                                <div class="alert alert-info">
                                    {{ session('update') }}
                                </div>
                            @endif
                            <form action="{{ url('/product/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="product_id" value="{{ $product_edit->id }}>
                                    <label for="">Category list</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">---select category---</option>
                                        @foreach ($categories as $category )
                                        <option {{ $product_edit->category_id == $category->id?'selected':''}} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Category list</label>
                                    <select name="subcategory_id" id="" class="form-control">
                                        <option value="">---select subcategory---</option>
                                        @foreach ($subcategories as $subcategory )
                                        <option {{ $product_edit->subcategory_id == $subcategory->id?'selected':''}} value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" value="{{ $product_edit->product_name }}">
                                    @error('product_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="text" name="product_price" class="form-control" value="{{ $product_edit->product_price }}">
                                    @error('product_price')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <textarea name="product_description" class="form-control"  cols="30" rows="10">{{  $product_edit->product_description  }}
                                    </textarea>
                                    @error('product_description')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Product Quantity</label>
                                    <input type="text" name="product_quantity" class="form-control" value="{{ $product_edit->product_quantity }}">
                                    @error('product_quantity')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <p>profile pic</p>
                                    <img class="w-25" src="{{ asset('uploads/products') }}/{{ $product_edit->product_image}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" name="product_image" class="form-control">
                                    @error('product_image')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                   <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
