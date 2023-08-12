@extends('Front.layout.navbarandfooter')
@section('main')
<div class="container">
    {!! Form::open(['method' => 'POST', 'data-action' => route('cart')]) !!}
    <div class="row">
        @if(count($products)==0)
<div class="text-center m-4 p-4">
    <h5>Sorry! No items in this category</h5>
</div>
        @else
        @foreach($products as $product)
        <div class="col-lg-4">
            <div class="product-item">
                <a href="#" class="btn-wishlist"><svg width="24"
                        height="24">
                        <use xlink:href="#heart"></use>
                    </svg></a>
                <figure>
                    <a href="{{ url('product/' . $product->urlslug) }}"
                        title="Product Title">
                        <img src="{{ asset('storage/productImages/'.$product->image) }}"
                            class="tab-image" >
                    </a>
                </figure>

                @if ($product->stock_quantity != null)
                {!! Form::hidden('stockquantity', $product->stock_quantity,['id'=>'stockquantity']) !!}
                <h3>{{ $product->name }}   <span
                    class="qty">{{ '('.$product->stock_quantity . ' Unit)' }}</span></h3>
                @else
                <h3>{{ $product->name }}</h3><span class="qty"></span>
                @endif
                <span class="price">&#8377;{{ $product->price }}</span>

                <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button"
                                class="quantity-left-minus btn btn-danger btn-number"
                                data-type="minus" data-field="">
                                <svg width="16" height="16">
                                    <use xlink:href="#minus"></use>
                                </svg>
                            </button>
                        </span>
                        @if (isset($quantity[$product->id]))
                            <input type="text" id="quantity" name="quantity"
                                class="form-control input-number"
                                value={{ $quantity[$product->id] }}>
                        @else
                            <input type="text" id="quantity" name="quantity"
                                class="form-control input-number" value='1'>
                        @endif
                        <span class="input-group-btn">
                            <button type="button"
                                class="quantity-right-plus btn btn-success btn-number"
                                data-type="plus" data-field="">
                                <svg width="16" height="16">
                                    <use xlink:href="#plus"></use>
                                </svg>
                            </button>
                        </span>
                    </div>
                    @if (Auth::check())
                        <button type="button" id="button_{{ $product->id }}"
                            class="add-to-cart nav-link">Add to Cart
                            <iconify-icon icon="uil:shopping-cart"></button>
                        {!! Form::hidden('customer_id', Auth::user()->id, ['id' => 'customer_id']) !!}
                    @else
                        <a type="button" id="button_{{ $product->id }}"
                            href="{{ url('userlogin') }}" class="add-to-cart nav-link">Add
                            to Cart
                            <iconify-icon icon="uil:shopping-cart"></a>
                    @endif
                    {!! Form::hidden('product_id', $product->id, ['id' => 'product_id']) !!}
                    {{ Form::close() }}
                </div>
            </div>
          </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    // var quantity = $(this).closest('.product-item').find('.input-number').val();
    $('.add-to-cart').click(function() {
        var parent = $(this).parents('.product-item');
        var quantity = parent.find('#quantity').val();
        var product_id = parent.find('#product_id').val();
        var customer_id = $('#customer_id').val();

        $.ajax({
            url: "{{ route('cart') }}",
            type: 'POST',
            data: {
                'quantity': quantity,
                'product_id': product_id,
                'customer_id': customer_id,
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {

                parent.find('.add-to-cart').html('<i>✔ Added to cart</i>').css('color','green');
                $('#cartitemscount').text(response.length);
            }
        });

    });

    function addStock() {
        var inp = $('#quantity').val();
        var stockQuantity = $('#stockquantity').val();//$('#quantity').val();
        console.log(stockQuantity);
        if (stockQuantity != 0 && inp > stockQuantity) {
            $('#oos').text("*" + "Out off stock")
        } else {
            $('#oos').text('');
        }
    }
</script>
@endsection
