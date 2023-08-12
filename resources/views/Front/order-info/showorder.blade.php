@extends('Front.layout.navbarandfooter')
@section('main')
<link rel="stylesheet" href="{{ asset('css/Front_css/cartpage.css') }}">
<div class="container">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-black">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link px-0 align-middle text-primary" style="color:">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-black">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle text-black">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li>
                </ul>
                <hr>

            </div>
        </div>
        <div class="col py-3">
            <h3 class="d-inline p-2 text-dark">Order-</h3>
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
                        @foreach($orderitems as $orders)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $orders->pname }}</td>
                        <td>{{ $orders->price }}</td>
                        <td>{{ !empty($orders->discount)?$orders->discount:'N/A' }}</td>
                        <td>{{ $orders->item_quantity }}</td>
                        <td>{{ $totals=!empty($orders->discount)?$orders->discount:$orders->price }}</td>
                        @php
                            $total+=$totals*$orders->item_quantity;
                        @endphp
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot class="bg-light">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total:{{ $total }}</td>
                        </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
