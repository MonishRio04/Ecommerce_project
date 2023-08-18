<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000; margin: 0;margin-right: 0;margin-left: 0;">
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
      <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="{{ URL::asset('https://authorselvi.com/wp-content/uploads/2022/01/as-logo1.svg') }}"></th>
        <th style="text-align:right;font-weight:400;">Date : {{ '20'. substr($maildata['created_at'],2,8) }}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">{{ $status[$maildata['status'] ]}}</b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order ID</span> #{{ $maildata['order_code'] }}</p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Payment type</span> {{ $maildata['payment_type']==3?'Cash on delievery':'online payment' }}</p>
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> {{ $maildata['adrname'] }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Mobile</span> {{ $maildata['adrmobileno'] }}</p>
          <!-- <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> +91-1234567890</p> -->
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">PIN Code:</span> {{ $maildata['pincode'] }}</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span>{{ $maildata['address'] }}</p>
          <!-- <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Number of gusets</span> 2</p> -->
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">No of items</span>{{count($items)}}</p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
      </tr>
       @php
          $total=0;
        @endphp
      <tr>
        <td colspan="2" style="padding:15px;">
            @foreach($items as $orders)
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
            <span style="display:block;font-size:13px;font-weight:normal;">{{ $orders['pname'] }}</span> &#8377;{{ 
              $totals=!empty($orders['discount'])?$orders['discount']:$orders['price'] 
            }} <b style="font-size:12px;font-weight:300;">Quantiy:{{ $orders['item_quantity'] }}</b>
            <!-- <b style="font-size:12px;font-weight:300;"></b> -->
          </p>          
           @php
              $total+=$totals*$orders['item_quantity'];
          @endphp
          @endforeach         
        </td><br>
        	<p style="font-size:14px;margin:0;padding:10px;font-weight:bold;">Total :{{$total}}</p>           
      </tr>
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Authorselvi<br>Vellore ,Sathuvacheri - 735221, TN, India<br><br>
          <b>Phone:</b> 987654322345<br>
          <b>Email:</b> contact@authorselvi.com
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>