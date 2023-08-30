@extends('Front.layout.navbarandfooter')
@section('main')
<link rel="stylesheet" href="{{ asset('css/Front_css/checkout.css') }}">
  <div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="text-light bg-dark p-1 rounded-circle">&nbsp;{{count($cartitems)}}&nbsp;</span>
            </h4>
            @php
                $total=0;
                $discount=0;
            @endphp
            @foreach($cartitems as $cart)
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $cart->product_name }}</h6>
                    </div>
                    <span class="text-muted">&#8377;{{ $price=$cart->product_price*$cart->quantity }}</span>
                </li>
                @php
                     $total+=(int)$price;
                  if($cart->discount!=null){
                    // dd((int)$cart->discount*$cart->quantity);
                        $discount=(int)$cart->product_price-$cart->discount;
                        $discount=$discount*$cart->quantity;
                        // dd($minus);
                  }
                @endphp
                @endforeach
                <li class="list-group-item d-flex justify-content-between" style="color:green">
                    <span>Discount</span>
                    <strong>-&#8377;<b id="discount">{{ $discount }}</b></strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong class="text-dark">&#8377;<b id="totalamount">{{ $overalltotal=$total-$discount }}</b></strong>
                </li>
            </ul>            
            <form class="card p-2" id="coupon_form" method="POST"  >
                @csrf
                <div class="input-group">
                    <input type="text" style="border-color:lightgrey" id="code" class="form-control" name="coupon_code" 
                    value="{{ $freecoupon!=null?$freecoupon:''; }}"
                    placeholder="Promo code">                   
                    <div class="input-group-append">
                        {{-- {{dd($freecoupon)}} --}}
                        <button type="button" id="coupon" class="btn btn-secondary">Redeem</button>
                       
                    </div>
                </div>
            </form>
              <p style="color:red;font-size:small" class="" id="err"></p>
        </div>
        <script>

        $("#coupon_form").on("keypress", function (event) {
                    var keyPressed = event.keyCode || event.which;
                    if (keyPressed === 13) {
                        event.preventDefault();
                        return false;
                    }
                });        
            var protect=0;
            $('#coupon').click(function(){
                var coupon_code=$('#code').val();
                $.ajax({
                    url:"{{url('apply-coupon')}}",
                    type:"POST",
                    data:{
                         coupon_code:coupon_code,
                        _token:"{{ csrf_token() }}",    
                    },
                    success:function(response){
                        // console.log();                        
                        var total=$('#totalamount').text();
                        // alert(total<response.discount_amount);
                        $('#couponid').val(response.id);                        
                        if(response.coupon=='used'){
                                $('#err').text('* You already apply this coupon');
                        }else{
                        if(response<=1){
                                $('#err').text('* Coupon code is not applicable read discription');
                        }else{
                        if(protect==0){
                            if(total>response.discount_amount){
                                if(response.minimum_purchase!=null){
                                    if(parseInt(total)<response.minimum_purchase){
                                        $('#err').text('* purchase atleast '+response.minimum_purchase+' to redeem the coupon')        
                                    }else{
                                        $('#err').text('');
                                        protect+=1;
                                        $('#discount').text( parseInt($('#discount').text())+response.discount_amount);
                                        $('#totalamount').text(parseInt(total)-response.discount_amount);
                                        $('#coupontotal').val(parseInt(total)-response.discount_amount)
                                    }   
                                }else{
                                    protect+=1;
                                    $('#err').text('');
                                    $('#discount').text(response.discount_amount);
                                    $('#totalamount').text(parseInt(total)-response.discount_amount);                        
                                    $('#coupontotal').val(parseInt(total)-response.discount_amount)                                
                                }
                            }else{

                                $('#err').text('* purchase atleast ' + response.discount_amount + ' to redeem the coupon');
      
                            }
                        }
                        else{
                            $('#err').text('* coupon is applicable for only once');
                        }
                    }
                    }
                },
                error:function(response){
                    $('#err').text('*'+response.responseJSON.message);
                },
                });

            })
        </script>
        <div class="col-md-8 order-md-1">
            {!! Form::open(['method'=>'POST','url'=>url('placeorder')]) !!}
            <h4 class="mb-3">Billing address</h4>
                <label for="adr"><i class="fa fa-address-card-o text-center"></i> Address</label>
                <select name="address" id="adr" class="form-control">
                <option name="address" disabled selected>Select Address </option>
                  @foreach($addre as $addr)
                  <option name="address" value="{{ array_search($addr,$addre) }}" >{{ $addr }}</option>
                  @endforeach

                </select>
                @error('address')
                    <p style="color:red;font-size:12px">*{{ $message }}</p>
                @enderror
                <input type="hidden" name="coupontotal" value="" id="coupontotal">
                <input type="hidden" name="couponid" value="" id="couponid">
                {{-- <hr class="mb-4 mt-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div> --}}
                <hr class="mb-4 mt-4">
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" value="0" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" value="1" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" value="2" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
					  <div class="custom-control custom-radio">
                        <input id="cod" name="paymentMethod" checked value="3" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="cod">Cash on delievery</label>
                    </div>
                </div>
                {!! Form::hidden('total', $overalltotal) !!}
                <div id="hiddenpart">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" style="border-color:lightgrey" class="form-control" id="cc-name" placeholder="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback"> Name on card is required </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" style="border-color:lightgrey" class="form-control" id="cc-number" placeholder="">
                        <div class="invalid-feedback"> Credit card number is required </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" style="border-color:lightgrey" class="form-control" id="cc-expiration" placeholder="">
                        <div class="invalid-feedback"> Expiration date required </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" style="border-color:lightgrey" class="form-control" id="cc-cvv" placeholder="">
                        <div class="invalid-feedback"> Security code required </div>
                    </div>
                </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block w-100" style="background-color:green" type="submit">Place order</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
</div>
<script>
    $('#hiddenpart').hide();
    $(document).ready(function(){
        var radioGroup = $('input[name="paymentMethod"]');
        for (var i = 0; i < radioGroup.length; i++) {
        $(radioGroup[i]).on('change', function() {
            if(this.value==3){
                $('#hiddenpart').slideUp();
            }
            else{
                $('#hiddenpart').slideDown()
            }

        });
        }
});
</script>
<div style="margin-top:50px">
@endsection
