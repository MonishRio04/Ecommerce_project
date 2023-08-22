
<!DOCTYPE html>
<html>
<head>
  <title>All orders</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <h1 style="text-align:center">All orders</h1>
    <div style="width:100%">
             <table style=" border-collapse:collapse;
            padding:10px;
            width:100%;font-size:10px">
            <tr style="background-color:#1B4965">
            <th style="color:white;padding:10px;border-top:1px solid black"><b>Order Date</b></th>
            <th style="color:white;padding:10px;border-top:1px solid black"><b>Order Code</b></th>
            <th style="color:white;padding:10px;border-top:1px solid black"><b>Customer Name</b></th>
            <th style="color:white;padding:10px;border-top:1px solid black"><b>Status</b></th>
            <th style="color:white;padding:10px;border-top:1px solid black"><b>Total Amount</b></th>
            <th style="color:white;padding:10px;border-top:1px solid black"><b>Payment Type</b></th>
        </tr>

        @foreach($orders as $order)
        <tr>
            <td style="padding:10px;border-top:1px solid black;background-color:white;text-align:center">{{$order->created_at->format('d.m.Y')}}</td>
            <td style="padding:10px;border-top:1px solid black;background-color:white;text-align:center">
                <a href="{{url('orders-controller/view-order/'.$order->id)}}">
                {{$order->order_code}}</a>
            </td>

            <td style="padding:10px;border-top:1px solid black;background-color:white;text-align:center">{{$order->username}}</td>
            <td style="padding:10px;border-top:1px solid black;background-color:white;text-align:center">{{$order->status}} </td>
            <td style="padding:10px;border-top:1px solid black;background-color:white;text-align:center"><span style="font-family: DejaVu Sans; sans-serif;">₹</span> {{$order->total}}</td>
              <?php
                  $type=[0=>'Credit card',1=>'Debit card',2=>'PayPal',3=>'COD'];
                  ?>
            <td style="padding:10px;border-top:1px solid black;background-color:white;text-align:center">{{$type[$order->payment_type]}}</td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
