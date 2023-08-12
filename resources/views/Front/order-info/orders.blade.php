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
            <h3 class="d-inline p-2 text-dark">All Orders</h3>
            <button onclick="history.back()" class="d-inline btn text-decoration-none p-2" style="float:right">
               <i class="fa fa-angle-double-left"></i> Back</button>
            <div class="container"style="padding:inherit;">
                <ul class="list-group">
                    <li class="list-group-item">
                         @foreach($orders as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="d-inline p-2 card-title"> Order Code:#{{ $order->order_code }}
                                </div>  <br><b>Status:</b>
                                <div  class="d-inline card-title rounded" id="orderstatus{{ $order->status }}">
                                    {{$status=$order->status==1?'To be approved':'Rejected'}}</div>
                            </div>
                            <div class="card-body">
                                <h5 class="d-inline p-2 card-title">Placed On:{{ $order->created_at }}</h5>
                                <h6 class="d-inline p-2 card-title" style="float:right">Qty :{{qutycount($order->id) }}</h6>
                              <p class="card-text">Total : &#8377;{{ $order->total }}</p>
                              <a href="{{ url('show-order/'.$order->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i>View</a>
                            </div>

                          </div>
                          @endforeach
                         </li>
                  </ul>
            </div>
        </div>
    </div>
</div>
@endsection
