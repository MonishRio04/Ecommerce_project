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
                    <strong>&#8377;{{ $discount }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong class="text-dark">&#8377;{{ $overalltotal=$total-$discount }}</strong>
                </li>
            </ul>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" style="border-color:lightgrey" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form>
        </div>
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
@endsection
