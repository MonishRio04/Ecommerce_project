@extends('Front.layout.navbarandfooter')
@section('main')
<style type="text/css">
    @media only screen and (max-width: 600px) {
    .cartlist{
        border:1px solid lightgrey;
        border-radius:5px;
        text-align:center
    }.mview{
        margin-top:10px;
        padding-left:170px;
    }
}
</style>
<section class="bg-light my-5 bg-white">
    <div class="container">
      <div class="row">
        <!-- cart -->
        <div id="col">
          <div class="card border shadow-0">
            {{-- {{ dd($cartitems) }} --}}
            <div class="m-4 cart-items">
              <h4 class="card-title mb-4">Your shopping cart</h4>
              @php
                    $total=0;
                   $discount=0;
              @endphp
              @foreach ($cartitems as $cart)
              <div class="row gy-3 mb-4 cartlist" id="{{ 'item'.$cart->id }}">
                <div class="col-lg-5">
                  <div class="me-lg-5">
                    <div class="d-flex">
                        <a href="{{ url('product/'. $cart->url) }}">
                      <img src="{{ asset('storage/productImages/'.$cart->image)}}" class="border rounded me-3" style="width: 96px; height: 96px;" />
                      <div class="">
                        <a href="#" class="nav-link">{{ $cart->product_name }}</a>
                        <p class="text-muted">{{ $cart->product_description }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                {{--  --}}
                {{--  --}}
                <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                  
                  <div style="margin-left: 15px;margin-top:19px">
                    <text class="h6">&#8377;{{ $price=(int)$cart->product_price * $cart->quantity}}</text> <br />
                    @if($cart->discount!=null)
                    <small class="text-muted">&#8377;<s class="">{{ $cart->product_price }} </s>
                        {{ $cart->discount }} / per item  <p style="color:green">
                            &#8377;{{ $cart->product_price-$cart->discount }} Discount applied on this item
                        </p></small>
                    @else
                      <small class="text-muted text-nowrap">&#8377;{{ $cart->product_price }}/ per item </small>
                      @endif
                  </div>
                </div>
                {{-- {{ dd('price-'.$cart->id) }} --}}
                {!! Form::hidden('quantity', $cart->quantity, ['class'=>'quan'.$cart->id]) !!}
                {!! Form::hidden('price', $cart->product_price*$cart->quantity, ['class'=>'price-'.$cart->id]) !!}
                {!! Form::hidden('discount',$cart->discount,['class'=>'discount'.$cart->id]) !!}
                <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                  <div class="float-md-end">
                    {{-- <a href="{{ url('cartdelete/'.$cart->id) }}" id="btn1" class="btn btn-danger"> Remove</a> --}}
                    <button  data-id="{{ $cart->id }}" class="btn btn-danger deleteRecord"> Remove</button>
                    <div class="mt-5 text-center">
                    <h6>Qty</h6>
                    {{-- <h4>{{ $cart->quantity }}</h4> --}}
                    <div class="d-flex">
                        {{-- @dd($cartitems) --}}
                        {{-- {{var_dump($cart->discount!=null?$cart->$discount:$cart->product_price)}} --}}
                        {{-- <input type="hidden" class='productprice' value="{{$cart->discount!=null?$cart->discount:$cart->product_price}}"> --}}
                        <a href="{{url('qtycontrol/'.'0/'.$cart->id)}}"class="btn btn-danger minus">-</a>
                        <input type="num" value="{{$cart->quantity}}" class="form-control quantity" style="width:50px">
                        <a href="{{url('qtycontrol/'.'1/'.$cart->id)}}" class="btn btn-success plus">+</a>
                    </div>
                    <p style="color:red;font-size:small" class="mt-3">{{Session::get('err')==$cart->id?'* minimum one quantity':''}}</p>       
                </div>
                  </div>
                </div>

              </div>@php
                  $total+=(int)$price;
                  if($cart->discount!=null){
                    // dd((int)$cart->discount*$cart->quantity);
                        $discount=(int)$cart->product_price-$cart->discount;
                        $discount=$discount*$cart->quantity;
                        // dd($minus);
                  }
              @endphp
              @endforeach
            </div>
            <div class="d-none emptycart" id="emptycart">
            <div class="text-center">
                <div class="border-top pt-4 mx-4 mb-4">
                  <p><i class="fas fa-truck"></i> No items in the cart</p>
                  <p class="text-muted text-center">
                    <a href="{{ url('/') }}" class="btn btn-primary">Add products</a>
                  </p>
                </div>
            </div>
            </div>
            {!! Form::hidden('cartcount',count($cartitems), ['id'=>'cartcount']) !!}
            @if(count($cartitems)==0)
                <script>$('#col').addClass("col-lg-12");</script>
            <div class="text-center" id="">
            <div class="border-top pt-4 mx-4 mb-4">
              <p><i class="fas fa-truck"></i> No items in the cart</p>
              <p class="text-muted text-center">
                <a href="{{ url('/') }}" class="btn btn-primary">Add products</a>
              </p>
            </div>
          </div>
            @else
            <script>$('#col').addClass("col-lg-9");</script>
            <div class="border-top pt-4 mx-4 mb-4">
                <p><i class="fas fa-truck"></i> Free Delivery within 1-2 weeks</p>
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip
                </p>
              </div>

          </div>
        </div>

        <!-- cart -->
        <!-- summary -->
            <div class="col-lg-3" id="coupon">
            <div class="card mb-3 border shadow-0">
                <div class="card-body">
                {{-- <form>
                    <div class="form-group">
                    <label class="form-label">Have coupon?</label>
                    <div class="input-group">
                        <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                        <button class="btn btn-light border">Apply</button>
                    </div>
                    </div>
                </form> --}}
                </div>
            </div>
            <div class="card shadow-0 border">
                <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Total price:</p>
                    <p style="margin-left: auto">&#8377;</p><p class="mb-2" id="total">{{ $total }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Discount:</p>
                    <p style="margin-left: auto">&#8377;</p><p class="mb-2"style="color:green"id="discount">{{ $discount }}</p>
                </div>
                <hr />
                <div class="d-flex justify-content-between" id="appendtotal">
                    <p class="mb-2">Total price:</p>
                    <p class="mb-2" style="color:#17a2b8 !important"id="overalltotal">&#8377;{{ $total-$discount }}</p>
                </div>

                <div class="mt-3">
                    <a href="{{ url('checkout/cart') }}" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                    <a href="{{ url('/') }}" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                </div>
                </div>
            </div>
            </div>
        @endif
        <!-- summary -->
      </div>
    </div>
    <script>
        $(document).ready(function(){
        // $('.deleteRecord').click(function(){
            $(document).on('click','.deleteRecord',function() {

            var id=$(this).data("id");
            // console.log(id);

            $.ajax({
                url:"{{ url('cartdelete') }}" + '/' + id,
                type:'GET',
                data:{
                    id:'id',
                _token:"{{ csrf_token() }}",
                },
                success:function(response){
                  var response=response.id;
                  var id='#item'+response;
                  $(id).slideUp();
                   var value=parseInt($('#cartitemscount').text()-1);
                   $('#cartitemscount').html(value);
                   if(parseInt(value)>=1){
                        var total=parseFloat($('#total').text());
                        var productprice=parseFloat($('.price-'+response).val());
                        var discount=parseInt($('#discount').text());
                        $('#total').text(total-productprice);
                        var minus=0;
                            if($('.discount'+response).val()!=''){
                                var minus=productprice-$('.discount'+response).val();
                                this.minus=minus*$('.quan'+response).val();
                                $('#discount').text(discount-minus).val();
                            }
                            total=parseInt($('#total').text());
                            var discount=parseInt($('#discount').text());
                            $('#overalltotal').text(total-discount);
                    }else{
                        $('#col').removeClass("col-lg-9").addClass("col-lg-12");
                        $('#coupon').hide();
                        $('.emptycart').removeClass('d-none');
                    }
                }});
            });
        });

    </script>
  </section>
  <!--   cart + summary -->
<script src="{{asset('js/front_js/index.js')}}"></script>
@endsection