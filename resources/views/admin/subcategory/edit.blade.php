@extends('layouts.dashboad')
@section('subcategory')
active
@endsection
@section('content')
@include('layouts.nav')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Dasboad</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
    </nav>
<div class="sl-pagebody">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Suncategory</h3>
                    </div>
                    <div class="card-body">
                        @if (session('update'))
                            <div class="alert alert-info">
                                {{ session('update') }}
                            </div>
                        @endif
                       <form action="{{url('/subcategory/update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="subcategory_id" value="{{ $subcategories->id }}">
                            <label for="" class="form-label">Category list</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $category )
                                <option {{ $subcategories->category_id == $category->id?'selected':''}} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                           <div class="form-group">
                               <label for="" class="form-label">Subcategory</label>
                               <input type="text" name="subcategory_name" class="form-control" value="{{ $subcategories->subcategory_name }}">
                           </div>
                               <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
