@extends('Front.layout.navbarandfooter')
@section('main')
<link rel="stylesheet" href="{{ asset('css/Front_css/cartpage.css') }}">

<div class="container">
    <div class="row flex-nowrap">
        @include('Front.layout.usersidebar')
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
                                    {{$orderstatus[$order->status]}}</div>
                            </div>
                            <div class="card-body">
                                <h5 class="d-inline p-2 card-title">Placed On:{{ $order->created_at->format('Y.m.d H:i a')}}</h5>
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
