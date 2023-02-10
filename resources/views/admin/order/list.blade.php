<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Detail</th>
        <th>Customer</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>
                General Information <br>
                <div>{{$order->name}}</div>
                <div><strong>SubTotal</strong>{{$order->sub_total}}</div>
                <div><strong>Tax</strong>{{$order->tax}}</div>
                <div><strong>Total</strong>{{$order->total}}</div>
                Detail Information <br>
                <ul>
                    @foreach($order->orderDetails as $orderDetail)
                        <li>
                            <div><strong>Product Name</strong>{{$orderDetail->name}}</div>
                            <div><strong>Price</strong>{{$orderDetail->price}}</div>
                            <div><strong>Quantity</strong>{{$orderDetail->quantity}}</div>
                        </li>
                    @endforeach
                </ul>
            </td>
            <td>
                {{$order->received_name}} <br>
            </td>
            <td>
                @switch($order->status)
                    @case(\App\Models\Order::STATUS_PENDING)
                    <span class="badge badge-warning">Pending</span>
                    @break
                    @case(\App\Models\Order::STATUS_SHIPPING)
                    <span class="badge badge-info">Shiping</span>
                    @break
                    @case(\App\Models\Order::STATUS_DELIVERED)
                    <span class="badge badge-success">Delivered</span>
                    @break
                    @case(\App\Models\Order::STATUS_CANCELED)
                    <span class="badge badge-danger">Cancelled</span>
                    @break
                @endswitch
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
