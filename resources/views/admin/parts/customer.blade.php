<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h2> Welcome {{ $logged_user_name }}</h2>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h1>Your order details</h1>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <tr>
                            <th>SL</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($order_by_users as $orders)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $orders->total }}</td>
                                <td>{{ $orders->discount }}</td>
                                <td>{{ $orders->sub_total }}</td>
                                <td>
                                    <a href="{{ url('/invoice/download') }}/{{ $orders->id }}" class="btn btn-primary">Download</a>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
