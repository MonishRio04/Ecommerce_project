@extends('Front.layout.navbarandfooter')
@section('main')
<link rel="stylesheet" type="text/css" href={{ asset('css/style.css') }}>

{{-- {{ dd(Auth::user()->id) }} --}}
<section class="py-5">
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
                    {!! Form::open(['method'=>'POST','data-action'=>'/cart']) !!}

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
                            <input name="quantity"  value={{ $quantity[$product->id] }} class="form-control text-center me-3" id="quantity" oninput="addStock()" type="num"  style="max-width: 3rem" />
                            @else
                            <input name="quantity"  value='1' class="form-control text-center me-3" id="quantity" oninput="addStock()" type="num" style="max-width: 3rem" />
                            @endif
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
                @if(Auth::check())
                <button type="button" id="button" class="add-to-cart btn btn-outline-dark m-5" >Add to cart</button>
                @else
                <a href="{{ route('login') }}"class="add-to-cart btn btn-outline-dark m-5" >Add to cart</a>
                @endif
            </div>
            <p class="lead">{{ $product->description }}</p>
{{-- {{dd($product)}} --}}
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
<section class="py-5" id="comments">
    <div class="container mt-5 mb-5">

        <div class="row height d-flex justify-content-center align-items-center">

          <div class="col-md-10">

            <div class="card">

              <div class="p-3">

                <h6>Comments</h6>

            </div>
            <form method="POST">
                <div id="append">
            <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">

                {{-- <img src="https://i.imgur.com/zQZSWrt.jpg" width="50" class="rounded-circle mr-2"> --}}
                <input type="text" class="form-control" id="cmnd"placeholder="Enter your comment...">
                <button class="btn btn-default" id="commentbtn" type="button" 
                style="background-color:#35B69F;color:white">submit</button>
            </div>  
            </div>
            </form>
            <script>
                $('#commentbtn').click(function(){
                var comment=$('#cmnd').val();
                $.ajax({
                    url:"{{url('add-comment')}}",
                    type:'POST',
                    data:{
                        'comment':comment,
                        'productslug':"{{$product->urlslug}}",
                        '_token':"{{csrf_token()}}"
                    },
                    success:function(response){
                        var newComment = `
                    <div class="d-flex flex-row p-3">
                        <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <span class="mr-2">${response.name}</span>
                                </div>
                                <small>${response.created_at}</small>
                            </div>
                            <p class="text-justify comment-text mb-0">${response.comments}</p>
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
            <div class="mt-2">
                @foreach($comments as $comment)
                <div class="d-flex flex-row p-3">

                  {{-- <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3"> --}}

                  <div class="w-100">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center">
                          <span class="mr-2">{{$comment->name}}</span>
                          {{-- <small class="c-badge">{{$comment->comment}}</small> --}}
                      </div>
                      <small>{{$comment->created_at}}</small>
                  </div>

                  <p class="text-justify comment-text mb-0">{{$comment->comments}}</p>

                  <div class="d-flex flex-row user-feed">

                    <span class="wish"><i class="fa fa-heartbeat mr-2"></i>{{$comment->likes}}</span>
                    {{-- <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span> --}}


                </div>

            </div>


        </div>

@endforeach

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
                // console.log(response.length);
                $('#button').text('Added to cart').css('color','black');
                $('#cartitemscount').html(response.length);
            },
            fail:function(){
                console.log('failed');
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
