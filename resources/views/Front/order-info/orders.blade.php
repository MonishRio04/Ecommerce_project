@extends('Front.layout.navbarandfooter')
@section('main')
<link rel="stylesheet" href="{{ asset('css/Front_css/cartpage.css') }}">
 @include('Front.layout.usersidebar')
        <div class="col py-3">
            {{-- {{dd($orders)}} --}}
            <h3 class="d-inline p-2 text-dark">All Orders</h3>
            <button onclick="history.back()" class="d-inline btn text-decoration-none p-2" style="float:right">
               <i class="fa fa-angle-double-left"></i> Back</button>
            <div class="container"style="padding:inherit;">
                <ul class="list-group">
                    <li class="list-group-item">
                        @if(count($orders)==0)
                             <div class="card-header text-center" style="background-color: #F2DEDE;">
                                <div class="d-inline p-2 card-title" style="color:#A94442;"><b>No Orders </b></div>
                            </div>
                        
                        @endif
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
                              <p class="card-text">Total : &#8377;{{ $order->total }}.00</p>
                              <a href="{{ url('show-order/'.$order->id) }}" class="btn btn-primary text-dark"><i class="fa-solid fa-eye"></i>View</a>
                              <a href="{{url('download-invoice/'.$order->id)}}" class="btn btn-info"><i class="fa fa-download"></i> Download Invoice</a>
                            </div>

                          </div>
                          @endforeach
                           <div class="d-felx justify-content-center">

            {{-- {{ $orders->links('pagination::bootstrap-4') }} --}}

        </div>
                         </li>
                  </ul>
            </div>
        </div>
    </div>
</div>
                           {{-- {!! $orders->links()!!} --}}

@endsection
