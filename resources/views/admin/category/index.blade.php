@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">

        </div>
        <div class="col-md-3">
            <div class="card-header">
                <h4>Add Category</h4>
            </div>
            <div class="card-body">
                <div class="bg-success">
                    {{ session('success') }}
                </div>
                <form action="{{ url('/category/insert') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
