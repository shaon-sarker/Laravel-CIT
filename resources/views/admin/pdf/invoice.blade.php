<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice PDF</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 80%;
    }

    .table-design tr th {
        background-color: rgb(0, 0, 0);
        padding-top: 5px;
        padding-bottom: 5px;
        color: white;
        padding-left: 3px;
        padding-right: 3px;
        font-family: 'Lato', sans-serif;
    }

    .table-design tr td {
        padding-left: 4px;
        padding-right: 4px;
        padding-top: 8px;
        padding-bottom: 8px;
        text-align: center;
        font-family: 'Lato', sans-serif;
    }

</style>

<body>
    <div class="table-design">
        <table border="1px">
            <tr>
                <th>Total</th>
                <th>Discount</th>
                <th>Subtotal</th>
            </tr>
            @foreach (App\Models\Orde_Product_Detail::where('order_id', $data->id)->get() as $order_details)
                <tr>
                    {{-- <td>{{ $order_details->product_name }}</td>
                <td>{{ $order_details->product_price }}</td> --}}
                    <td>{{ $data->total }}</td>
                    <td>{{ $data->discount }}</td>
                    <td>{{ $data->sub_total }}</td>
                </tr>
            @endforeach

        </table>
    </div>
</body>

</html>
