@extends('layouts.dashboad')
@section('coupon')
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
        <div class="col-md-8">
            <h2 class="bg-dark text-white p-2 mt-3 text-center">Coupon list</h2>
            @if (session('delsuccess'))
            <div class="alert alert-success">
                {{ session('delsuccess') }}
            </div>
            @endif
            <table class="table">
                <th>Sl</th>
                <th>Coupon Name</th>
                <th>Coupon Percent By</th>
                <th>Coupon Validate</th>
                <th>Created at</th>
                <th>Action</th>
            <tbody>
                @foreach ($coupons as $coupon )
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $coupon->coupon_name }}</td>
                    <td>{{ $coupon->coupon_parcentage }}</td>
                    <td>{{ $coupon->coupon_validate }}</td>
                    <td>{{ $coupon->created_at->diffForHumans()}}</td>
                    <td><a href="" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach


            </tbody>
        </table>

        </div>
        <div class="col-md-3 mt-3">
            <div class="card-header text-white bg-dark">
                <h4>Add Coupon</h4>
            </div>
            <div class="card-body">
                @if (session('coupon'))
                <div class="alert alert-warning">
                    {{ session('coupon') }}
                </div>
                @endif
                <form action="{{ url('/coupon/insert') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="coupon_name">
                        @error('coupon_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Coupon_parcentage</label>
                        <input type="text" class="form-control" name="coupon_parcentage">
                        @error('coupon_parcentage')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Coupon Validate</label>
                        <input type="date" class="form-control" name="coupon_validate">
                        @error('coupon_validate')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
