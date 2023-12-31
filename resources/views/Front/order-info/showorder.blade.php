@extends('Front.layout.navbarandfooter')
@section('main')
<link rel="stylesheet" href="{{ asset('css/Front_css/cartpage.css') }}">
<script>$('#orders').css({'color':'#FFC43F'});</script>
        @include('Front.layout.usersidebar')
        <div class="col py-3">
            <h3 class="d-inline p-2 text-dark">Order-Items</h3>
            <button onclick="history.back()" class="d-inline btn text-decoration-none p-2" style="float:right">
               <i class="fa fa-angle-double-left"></i> Back</button>
               <div class="container">
                <div class="row mt-4">
                    <div class="col-sm">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Order Details </h5>
                            <p class="card-text mb-0">Order Code : #{{ $order['order_code'] }}</p>
                            <p class="card-text mb-0">Order Date : {{ '20'. substr($order['created_at'],2,8) }}</p>
                            <p class="card-text mb-0" >Status : {{ $order['status']==1?'Order Approved':'Rejected' }}</p>
                            <p class="card-text mb-0">Payment Status : {{ $order['payment_type']==3?'Cash on delievery':'online payment' }}</p>
                           </div>
                        </div>
                      </div>
                  <div class="col-sm">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"> <i class="fa fa-address-card-o"></i> Contact</h5>
                            <p class="card-text mb-0">Name : {{ $order['adrname'] }}</p>
                            <p class="card-text mb-0">Mobile : {{ $order['adrmobileno'] }}</p>
                            <p class="card-text mb-0">Address : {{ $order['address'] }} <br>Pincode :{{ $order['pincode'] }}</p>
                       </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text mb-0">O"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore  </p>
                            {{-- <p class="card-text mb-0">Order Code :</p>
                            <p class="card-text mb-0">Order Code :</p>
                            <p class="card-text mb-0">Order Code :</p> --}}
                       </div>
                    </div>
                  </div>
                </div>
              </div>
                  <div class="mt-5 p-3 order-table table-responsive">
                    @php
                        $total=0;
                    @endphp
                  <table class="table">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @dd($orderitems) --}}
                        @foreach($orderitems as $orders)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $orders->pname }}</td>
                        <td>&#8377;{{ $orders->prprice }}</td>
                        <td>{{ !empty($orders->discount)?$orders->discount:'N/A' }}</td>
                        <td>{{ $orders->item_quantity }}</td>
                        <td>&#8377;{{ $totals=!empty($orders->discount)?$orders->discount:$orders->prprice }}</td>
                        @php
                            $total+=$totals*$orders->item_quantity;
                        @endphp
                      </tr>
                      @endforeach
                      @if($order['couponname']!=null&&$order['couponcode']!=null&&$order['couponamount']!=null)
                      <tr>
                          <th scope="col">Coupon Details</th>
                            <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col" style="color:green">{{$order['couponname']}}</th>
                        <th scope="col"style="color:green">{{$order['couponcode']}}</th>
                        <th scope="col"style="color:green">&#8377;{{$order['couponamount']}}</th>
                      </tr>
                      @endif
                    </tbody>
                    <tfoot class="bg-light">
                        <tr>                           
                            <td colspan="6" style="text-align:right;color:red">Total : &#8377;{{$total-$order['couponamount'] }}   &nbsp;  &nbsp;  &nbsp;  &nbsp;  </td>
                        </tr>
                    </tfoot>
                  </table>
                    <div class=" text-center"><a href="{{url('download-invoice/'.$order['id'])}}" class="btn btn-info"><i class="fa fa-download"></i> Download invoice</a></div>

                </div>
            </div>
        </div>
    </div>
@endsection
