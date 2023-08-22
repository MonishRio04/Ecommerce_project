@extends('admin.layout.headerandfooter')
@section('admincontent')
  <style>
    body {
      background-color: whitesmoke;
      font-family: Open Sans, sans-serif;
      font-size: 100%;
      font-weight: 400;
      line-height: 1.4;
      color: #000;
      margin: 0;
      padding: 0;
      width: 100%;
    }

    .email-container {
      max-width: 670px;
      margin: 50px auto 10px;
      background-color: #fff;
      padding: 50px;
      border-top: solid 10px green;
      box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
      border-radius: 3px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header img {
      max-width: 150px;
    }

    .details {
      border: solid 1px #ddd;
      padding: 10px 20px;
      margin-top: 35px;
    }

    .status {
      font-weight: bold;
      color: green;
    }

    .address-section {
      display: flex;
    }

    .address-column {
      width: 50%;
      padding: 20px;
      box-sizing: border-box;
    }

    .items-table {
      width: 80%;
      border-collapse: collapse;
      margin-top: 30px;
      text-align: center;
    }

    .items-table th,
    .items-table td {
      border-bottom: solid 1px #ddd;
      padding: 10px;
      text-align: right;
    }   

    .footer {
      font-size: 14px;
      padding: 50px 15px 0 15px;
    }
  </style>
  <main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto"style="background-color: white;">    
    <div class="flex bg-green-200 p-4 mx-16 ">
        <!-- <div class="flex-1 bg-green-500 rounded-lg"><h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Order list</h4>
        </div>
        <a href="{{url('export-orders')}}" style="margin: 10px;" 
       class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <span><i class="fa fa-download"></i> Export Excel</span>
      </a> -->
    </div>     
 <p class="date" style="text-align: right !important;">Date: {{ '20' . substr($maildata['created_at'], 2, 8) }}</p>
    <div class="details">
      <p><span class="status">Order status: {{ $status[$maildata['status']] }}</span></p>
      <p>Order ID: #{{ $maildata['order_code'] }}</p>
      <p>Payment type: {{ $maildata['payment_type'] == 3 ? 'Cash on delivery' : 'online payment' }}</p>
    </div>
    <div class="address-section">
      <div class="address-column">
        <p><span>Name:</span> {{ $maildata['adrname'] }}</p>
        <p><span>Mobile:</span> {{ $maildata['adrmobileno'] }}</p>
        <p><span>PIN Code:</span> {{ $maildata['pincode'] }}</p>
      </div>
      <div class="address-column">
        <p><span>Address:</span> {{ $maildata['address'] }}</p>
        <p><span>No of items:</span> {{ count($items) }}</p>
      </div>
    </div>
    <h2>Items</h2>
    <table class="items-table">
      <thead>
        <tr>
          <th style="width:50%;text-align: left;">Product Name</th>
          <th style="width:20%;text-align:center">Quantity</th>
          <th style="width:30%">Price</th>
        </tr>
      </thead>
      <tbody>
        @php
        $total = 0;
        @endphp
        @foreach($items as $orders)
        <tr>
          <td style="text-align: left;">{{ $orders['pname'] }}</td>
          <td style="text-align: center;">{{ $orders['item_quantity'] }}</td>
          <td>&#8377;{{ !empty($orders['discount']) ? $orders['discount'] : $orders['price'] }}</td>
        </tr>
        @php
        $total += (!empty($orders['discount']) ? $orders['discount'] : $orders['price']) * $orders['item_quantity'];
        @endphp
        @endforeach
        <tr>
          <td></td>
          <td></td>
          <td class="total">Total : &#8377;{{ $total }}</td>
        </tr>
      </tbody>
    </table>
    <div class="footer">
      <strong>Regards,</strong><br>
      Authorselvi<br>
      Vellore, Sathuvacheri - 735221, TN, India<br><br>
      <b>Phone:</b> 987654322345<br>
      <b>Email:</b> contact@authorselvi.com
    </div>
  </div>
</main>
@endsection