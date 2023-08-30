<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$order['id']}}</title>
</head>
<body style="padding:10px;color:#808080;
  font-family: Arial, Helvetica, sans-serif;">
    <div style="padding-top: 15px; padding-bottom: 15px;">
   {{--  <button onclick="history.back()" style="display: inline-block; text-decoration: none; padding: 10px; float: right;">
        <i class="fa fa-angle-double-left"></i> Back
    </button> --}}  
    <table style="color: #808080;">
    <thead>
      <tr>
        <th colspan="3" style="color:black;font-size:25px;text-align: center;padding: 30px 0;">Order-Items</th>
      </tr>
    </thead>
    <tbody>
      <tr style="font-size: 7px;">
        <td style="color:#808080;padding:0px 40px 0px 10px;border: 1px solid #dddddd;border-radius: 5px;font-size:large;">
       <p><b>Order Details</b></p>
        <p>Order Code : {{$order['order_code']}}</p>
        <p>Order Date : {{date('Y-m-d',strtotime($order['created_at']))}}</p>
        <p>Status : {{ $order['status']==1?'Order Approved':'Rejected' }}</p>
        <p>Payment Status : {{ $order['payment_type']==3?'Cash on delievery':'online payment' }}</p>
        </td>
        <td style="padding: 30px;"></td>
        <td style="margin-left:100px;padding:0px 100px 0px 10px;border: 1px solid #dddddd;border-radius: 5px;font-size:large">
          <p><b>Contact</b></p>
          <p> Name : {{$order['adrname']}}</p>
          <p>Mobile : {{$order['adrmobileno']}}</p>
          <p>Address : {{$order['address']}}</p>
          <p> Pincode :{{$order['pincode']}}</p>
        </td>
      </tr>
    </tbody>
  </table>
<div style="margin-top: 30px; padding: 15px; background-color: #fff; overflow-x: auto;">
    @php $total = 0; @endphp
    <table style="width: 100%;">
        <thead style="background-color: #f8f9fa;">
            <tr>
                <th style="text-align: left; padding: 8px;">S.No</th>
                <th style="text-align: left; padding: 8px;">Product Name</th>
                <th style="text-align: left; padding: 8px;">Price</th>
                <th style="text-align: left; padding: 8px;">Discount</th>
                <th style="text-align: left; padding: 8px;">Qty</th>
                <th style="text-align: left; padding: 8px;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderitems as $orders)
            <tr style="border-bottom:black">
                <td style="text-align: left; padding: 8px;">{{ $loop->iteration }}.</td>
                <td style="text-align: left; padding: 8px;">{{ $orders->pname }}</td>
                <td style="text-align: left; padding: 8px;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $orders->price }}</td>
                <td style="text-align: left; padding: 8px;">{{ !empty($orders->discount) ? $orders->discount : 'N/A' }}</td>
                <td style="text-align: left; padding: 8px;">{{ $orders->item_quantity }}</td>
                <td style="text-align: left; padding: 8px;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $totals = !empty($orders->discount) ? $orders->discount : $orders->price }}</td>
                @php $total += $totals * $orders->item_quantity; @endphp
            </tr>
            @endforeach
            @if($order['couponname'] != null && $order['couponcode'] != null && $order['couponamount'] != null)
            <tr>
                <td colspan="3" style="text-align: left; padding: 8px;">Coupon Details</td>
                <td colspan="3" style="text-align: left; padding: 8px; color: green;">{{$order['couponname']}} | {{$order['couponcode']}} | <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$order['couponamount']}}</td>
            </tr>
            @endif
        </tbody>
        <tfoot style="background-color: #f8f9fa;">
            <tr>
                <td colspan="6" style="text-align: right; padding: 8px; color: red;">Total :<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>  {{$total - $order['couponamount']}}</td>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</body>
</html>
