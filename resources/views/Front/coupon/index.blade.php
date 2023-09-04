@extends('Front.layout.navbarandfooter')
@section('main')
@include('Front.layout.usersidebar')
 
<link rel="stylesheet" href="{{asset('css/Front_css/coupon.css')}}">    
<div class="row" style="width:90%">
    @if(count($coupons)<1)
    <div class="col-md-12 mt-6 text-center">
        <h3 class="text-dark">! No coupons</h3>
    </div>
    @endif
	@foreach($coupons as $key=>$coupon)
	<div class="col-md-6 mb-4">
		<div class="coupon-card" style="background:linear-gradient(135deg,#87CEFA,{{$colors[$key]}});width:100%;">
                <h3  style="font-size:initial" >{{$coupon->coupon_name}}</h3>
                <di class="coupon-row">
                    <span id="cpnCode"class="cpnCode">{{$coupon->coupon_code}}</span>
                    <span id="cpnBtn" data-code={{$coupon->coupon_code}}	class="cpnBtn">Copy Code</span>
                </di>
                <p style="color:black;font-size:12px">Valid Till: {{$coupon->expires_at}}<br>
                    {{$coupon->description}}
                </p>

                <div class="circle1"></div>
                <div class="circle2"></div>
            </div>
</div>
@endforeach
</div>
{{--  --}}
</div> 
<script>
       $(document).ready(function() {
            $(document).on('click', '.cpnBtn', function() {
                var cpnCodeText = $(this).data('code');
                navigator.clipboard.writeText(cpnCodeText);
                $(this).text("COPIED");
                // setTimeout(function() {
                //     $(this).text("COPY CODE");
                // }, 3000);
            });
        });
</script>
@endsection
