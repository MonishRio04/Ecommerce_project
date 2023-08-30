@extends('Front.layout.navbarandfooter')
@section('main')
<link rel="stylesheet" type="text/css" href={{ asset('css/style.css') }}>

{{-- {{ dd(Auth::user()->id) }} --}}
<section class="py-2">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                {{-- {{ dd($product->image) }} --}}

                <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/productImages/'.$product->image)}}" alt="{{ $product->image }}" /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                    <div class="fs-5 mb-5">
                        {{-- {{ dd($product->discount_price!=null) }} --}}
                        @if($product->discount_price!=null)
                        <span class="text-decoration-line-through">{{ $product->price }}</span>
                        <span>&#8377;{{ $product->discount_price }}</span>
                        @else
                        <span>&#8377;{{ $product->price }}</span>
                        @endif
                    </div>
                    {{-- {{ dd($product->stock_quantity) }} --}}
                    {!! Form::open(['method'=>'POST','data-action'=>'/cart','url'=>route('buynow')]) !!}

                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="input-group product-qty">
                                <span class="input-group-btn">
                                    <button type="button"
                                    class="quantity-left-minus btn btn-danger btn-number" style="margin-right: 17px"
                                    data-type="minus" data-field="">
                                    <svg width="16" height="16">
                                        <use xlink:href="#minus"></use>
                                    </svg>
                                </button>
                            </span>
                            {{-- {{ dd($quantity[$product->id]) }} --}}
                            @if(isset($quantity[$product->id]))
                            <input name="quantity"  value={{ $quantity[$product->id] }} class="form-control text-center me-3" id="quantity" oninput="addStock()" type="num"  style="max-width: 3rem;border-color:transparent" />
                            @else
                            <input name="quantity" value='1' class="form-control text-center me-3" id="quantity" oninput="addStock()" type="num" style="max-width: 3rem; border-color: transparent;" />
                            @endif
                            {{-- @dd(var_dump($errors)) --}}
                            @error('quantity')
                             <br><p style="color:red">*{{$message}}</p>
                            @enderror  
                            <p style="color:red" id="oos"></p>
                            <span class="input-group-btn">
                                <button type="button"
                                class="quantity-right-plus btn btn-success btn-number"
                                data-type="plus" data-field="">
                                <svg width="16" height="16">
                                    <use xlink:href="#plus"></use>
                                </svg>
                            </button>
                        </span>
                    </div><br>
                </div>
            </div>  
            <div class="d-flex mt-4 mb-4">
                @if(Auth::check())
                <button type="button" id="button" class="add-to-cart btn btn-outline-dark m-2" >Add to cart</button>
                <button type="submit"  class="btn btn-success m-2" >Buy now</button>
                 
                @else
                <a href="{{ route('login') }}"class="add-to-cart btn btn-outline-dark m-2" >Add to cart</a>
                <a href="{{ route('login') }}"class="add-to-cart btn btn-success m-2" >Buy now</a>
                @endif
            </div>
            <p id="quanerror" style="color:red"></p>
            <p class="lead">{{ $product->description }}</p>
        </div>
    </div>
</div>
@if(Auth::check())
{!! Form::hidden('product_id',$product->id,['id'=>'product_id'])!!}
{!! Form::hidden('customer_id',Auth::user()->id,['id'=>'customer_id'])!!}
{!! Form::close() !!}
@endif
{{-- <a href="{{ route('cart',Auth::user()->id,$product->id,1) }}">hello</a> --}}
</section>
<section class="" id="reviews">
    <div class="container mt-5 mb-5">

        <div class="row height d-flex justify-content-center align-items-center">

          <div class="col-md-10">

            <div class="card">

              <div class="p-3">

                <h6>Reviews</h6>

            </div>
            <form method="POST">
                <div id="append">
                    <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                        <input type="reset" hidden id="reset">
                        {{-- <img src="https://i.imgur.com/zQZSWrt.jpg" width="50" class="rounded-circle mr-2"> --}}
                        <input type="text" class="form-control" id="cmnd"placeholder="Add Review...">
                        <button class="btn btn-default" id="commentbtn" type="button" 
                        style="background-color:#35B69F;color:white">submit</button>
                    </div>  
                </div>
            </form>
            <script>
                $('#commentbtn').click(function(){                    
                    var review=$('#cmnd').val();
                    $.ajax({
                        url:"{{url('add-comment')}}",
                        type:'POST',
                        data:{
                            'review':review,
                            'productslug':"{{$product->urlslug}}",
                            '_token':"{{csrf_token()}}"
                        },
                        success:function(response){
                             // location.reload();
                             $('#reset').trigger('click')
                             $("#comnt").load(location.href + " #comnt");
                            var newComment = `
                            <div class="d-flex flex-row p-3 mb-2" style="border:1px solid lightgrey;border-radius:4px;">
                            <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center">
                            <span class="mr-2">${response.name}</span>
                            </div>
                            <small></small>
                            </div>  
                            <p class="text-justify comment-text mb-0">${response.reviews}</p>
                            <div class="d-flex flex-row user-feed">
                            <span class="wish"><i class="fa fa-heartbeat mr-2"></i></span>
                            </div>
                            </div>
                            </div>
                            `;
                            $('.mt-2').prepend(newComment);
                        }
                    })
                })
            </script>
            <div class="mt-2" id="comnt">
                @foreach($reviews as $review)
                <div class="d-flex flex-row p-3 mb-2" style="border:1px solid lightgrey;border-radius:4px;">

                  {{-- <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3"> --}}

                  <div class="w-100">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center">
                          <span class="mr-2">{{$review->name}}</span>
                          {{-- <small class="c-badge">{{$comment->comment}}</small> --}}
                      </div>
                      <small>{{liveTime($review->created_at)}}</small>
                  </div>
                  {{-- <input type="hidden" value="{{$review->id}}"> --}}
                  <p class="text-justify comment-text mb-0">{{$review->comments}}</p>
                  <div class="d-flex flex-row user-feed">
                    <label>
                        <input type="checkbox" hidden class="likevalue" data-id="{{url('add-like').'/'.$review->id}}">
                        <span class="wish d-flex">
                            {{-- {{dd(isLiked($review->id))}} --}}
                            <i class="fa fa-heartbeat mr-2 like" style="cursor:pointer;color:{{isLiked($review->id)?'grey':'#35B69F'}}">&nbsp;
                                <small  id="like{{$review->id}}">{{totalLikes($review->id)!=null?totalLikes($review->id):''}}</small></i> 
                        <input type="hidden" data-id="{{$review->id}}" class="isliked" value="{{isLiked($review->id)}}">
                        </span>
                    </label>
                </div>           

            </div>
        </div>

        @endforeach
        <script>

        $(document).on("change",".likevalue", function() {                        
                var like = $(this).siblings(".wish").find(".like");
               
                if($(this).is(':checked')){
                    like.css('color','#35B69F').animate({fontSize:'1.5em'});
                    like.css('color','#35B69F').animate({fontSize:'1em'});
                }else{
                    like.css('color','grey');
                }
                $.ajax({
                    url:$(this).data('id'),
                    type:"get",
                    success:function(response){
                        response.like!=0?$('#like'+response.id).text(response.like):$('#like'+response.id).text('');
                    }

                })
         });
    </script>

</div>

</div>
</div>

</div>
</div>
</section>
<p id="test"></p>
<script>
    $('.add-to-cart').click(function(){
        var quantity = $('#quantity').val();
        var product_id = $('#product_id').val();
        var customer_id = $('#customer_id').val();
        // console.log(customer_id);
        $.ajax({
            url:"{{ route('cart') }}",
            type:'POST',
            data:{
                'quantity':quantity,
                'product_id':product_id,
                'customer_id':customer_id,
                _token:'{{ csrf_token() }}',
            },
            success:function(response){
                
                $('#button').text('Added to cart').css('color','white').css('background-color','#212529');
                $('#cartitemscount').html(response.length);
            },
            error:function(response){
                console.log(response.responseJSON.message);
                $('#quanerror').text('*'+   response.responseJSON.message);
            }
           
        });

    });

    function addStock() {
        var inp = $('#quantity').val();
        var stockQuantity = {{ $product->stock_quantity }}; //$('#quantity').val();
        console.log(stockQuantity);
        if (stockQuantity != 0 && inp > stockQuantity) {
            $('#oos').text("*" + "Out off stock")
        } else {
            $('#oos').text('');
    }
}
</script>

@endsection