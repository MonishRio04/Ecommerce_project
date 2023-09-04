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
    <div style="padding-top: 15px;margin:20px">
    <img src="https://authorselvi.com/wp-content/uploads/2022/01/as-logo1.svg" style="text-align:left;">
    <table style="color: #808080;width:100%">
    <thead>
      <tr>
        <th colspan="3" style="color:black;font-size:20px;text-align: left;padding: 30px 0;">Order Items</th>
      </tr>
    </thead>
    <tbody>
      <tr style="">
        <td style="color:#808080;padding:0px 20px 0px 10px;border: 1px solid #dddddd;border-radius: 5px;font-size:medium;">
       <p><b>Order Details</b></p>
        <p>Order Code : {{$order['order_code']}}</p>
        <p>Order Date : {{date('Y-m-d',strtotime($order['created_at']))}}</p>
        <p>Status : {{ $order['status']==1?'Order Approved':'Rejected' }}</p>
        <p>Payment Status : {{ $order['payment_type']==3?'Cash on delievery':'online payment' }}</p>
        </td>
        <td style="padding: 10px;"></td>
        <td style="margin-left:100px;padding:0px 60px 0px 10px;border: 1px solid #dddddd;border-radius: 5px;font-size:medium">
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
            {{-- @dd($orderitems) --}}
            @foreach($orderitems as $orders)
            <tr style="border-bottom:black">
                <td style="text-align: left; padding: 8px;">{{ $loop->iteration }}.</td>
                <td style="text-align: left; padding: 8px;">{{ $orders->pname }}</td>
                <td style="text-align: left; padding: 8px;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $orders->prprice }}</td>
                <td style="text-align: left; padding: 8px;">{{ !empty($orders->discount) ? $orders->discount : 'N/A' }}</td>
                <td style="text-align: left; padding: 8px;">{{ $orders->item_quantity }}</td>
                <td style="text-align: left; padding: 8px;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $totals = !empty($orders->discount) ? $orders->discount : $orders->prprice }}</td>
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
                <td colspan="5"style="text-align:right">Total :</td>
                <td  style="text-align: left; padding: 8px; color: rgb(240, 56, 56);"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>  <b>{{$total - $order['couponamount']}}.00</b></td>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</body>
</html>
{{-- <?php exit; ?> --}}