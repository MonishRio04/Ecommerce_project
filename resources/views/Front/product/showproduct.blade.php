@extends('Front.layout.navbarandfooter')
@section('main')
<link rel="stylesheet" type="text/css" href={{ asset('css/Front_css/style.css') }}>

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
                    <span>{{ $product->discount_price }}</span>
                    @else
                        <span>{{ $product->price }}</span>
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
<p id="test"></p>
<script>
    $('.add-to-cart').click(function(){
        var quantity = $('#quantity').val();
        var product_id = $('#product_id').val();
        var customer_id = $('#customer_id').val();
        $.ajax({
            url:"{{ route('cart') }}",
            type:'POST',
            data:{
                'quantity':quantity,
                'product_id':product_id,
                'customer_id':customer_id,
                _token:'{{ csrf_token() }}',
            },
            success:function(responce){
                $('#button').text('Added to cart').css('color','green');
                $('#cartitemscount').html(responce.length);
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
