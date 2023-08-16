@extends('Front.layout.navbarandfooter')
@section('main')
{{-- {{ dd(category()) }} --}}
<script src="{{asset('js/front_js/wishlist.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/Front_css/style.css') }}">
    <div class="container-fluid">
        <div class="row py-3">
            <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
                <nav class="main-menu d-flex navbar navbar-expand-lg">

                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">

                        <div class="offcanvas-header justify-content-center">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">

                            <select class="filter-categories border-0 mb-0 me-5">
                                <option>Shop by Departments</option>
                                <option>Groceries</option>
                                <option>Drinks</option>
                                <option>Chocolates</option>
                            </select>

                            <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                                <li class="nav-item active">
                                    <a href="#women" class="nav-link">Women</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#men" class="nav-link">Men</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#kids" class="nav-link">Kids</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#accessories" class="nav-link">Accessories</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" role="button" id="pages"
                                        data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu" aria-labelledby="pages">
                                        <li><a href="about.html" class="dropdown-item">About Us</a></li>
                                        <li><a href="shop.html" class="dropdown-item">Shop<span
                                                    class="badge bg-success text-dark ms-2">PRO</span></a></li>
                                        <li><a href="single-product.html" class="dropdown-item">Single
                                                Product<span class="badge bg-success text-dark ms-2">PRO</span></a>
                                        </li>
                                        <li><a href="cart.html" class="dropdown-item">Cart<span
                                                    class="badge bg-success text-dark ms-2">PRO</span></a></li>
                                        <li><a href="checkout.html" class="dropdown-item">Checkout<span
                                                    class="badge bg-success text-dark ms-2">PRO</span></a></li>
                                        <li><a href="blog.html" class="dropdown-item">Blog</a></li>
                                        <li><a href="single-post.html" class="dropdown-item">Single Post</a></li>
                                        <li><a href="styles.html" class="dropdown-item">Styles</a></li>
                                        <li><a href="contact.html" class="dropdown-item">Contact<span
                                                    class="badge bg-success text-dark ms-2">PRO</span></a></li>
                                        <li><a href="thank-you.html" class="dropdown-item">Thank You</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#brand" class="nav-link">Brand</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sale" class="nav-link">Sale</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#blog" class="nav-link">Blog</a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </nav>
                <div class="d-none d-lg-block">
                    <a href="#" class="nav-link btn-coupon-code">
                        <img src={{ asset('images/gift.svg') }}>
                        <strong class="ms-2">Get your coupon code</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </header>

    <section class="py-3"
        style="background-image: url('images/background-pattern.jpg');background-repeat: no-repeat;background-size: cover;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="banner-blocks">

                        <div class="banner-ad large bg-info block-1">

                            <div class="swiper main-swiper">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories mb-3 pb-3">100% natural</div>
                                                <h3 class="banner-title">Fresh Smoothie & Summer Juice</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa
                                                    diam elementum.</p>
                                                <a href="#"
                                                    class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">shop
                                                    collection</a>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src={{ asset('images/product-thumb-1.png') }} class="img-fluid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories mb-3 pb-3">100% natural</div>
                                                <h3 class="banner-title">Fresh Smoothie & Summer Juice</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa
                                                    diam elementum.</p>
                                                <a href="#"
                                                    class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">shop
                                                    collection</a>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src={{ asset('images/product-thumb-1.png') }} class="img-fluid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="row banner-content p-5">
                                            <div class="content-wrapper col-md-7">
                                                <div class="categories mb-3 pb-3">100% natural</div>
                                                <h3 class="banner-title">Heinz Tomato Ketchup</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa
                                                    diam elementum.</p>
                                                <a href="#"
                                                    class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">shop
                                                    collection</a>
                                            </div>
                                            <div class="img-wrapper col-md-5">
                                                <img src={{ asset('images/product-thumb-2.png') }} class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-pagination"></div>

                            </div>
                        </div>

                        <div class="banner-ad bg-success block-2"
                            style="background:url('images/ad-image-1.png') no-repeat;background-position: right bottom">
                            <div class="row banner-content p-5">

                                <div class="content-wrapper col-md-7">
                                    <div class="categories sale mb-3 pb-3">20% off</div>
                                    <h3 class="banner-title">Fruits & Vegetables</h3>
                                    <a href="#" class="d-flex align-items-center nav-link">shop collection <svg
                                            width="24" height="24">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg></a>
                                </div>

                            </div>
                        </div>

                        <div class="banner-ad bg-danger block-3"
                            style="background:url('images/ad-image-2.png') no-repeat;background-position: right bottom">
                            <div class="row banner-content p-5">

                                <div class="content-wrapper col-md-7">
                                    <div class="categories sale mb-3 pb-3">15% off</div>
                                    <h3 class="item-title">Baked Products</h3>
                                    <a href="#" class="d-flex align-items-center nav-link">shop collection <svg
                                            width="24" height="24">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg></a>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- / Banner Blocks -->

                </div>
            </div>
        </div>
    </section>

    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex justify-content-between mb-5">
                        <h2 class="section-title">Categorys</h2>

                        <div class="d-flex align-items-center">
                            <a href="{{ url('all-categories') }}" class="btn-link text-decoration-none">View All Categories →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                                <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach ($category as $cate)
                                <a href="{{ url('categories/'.$cate->name) }}" class="nav-link category-item swiper-slide">
                                    <img src="storage/images/{{ $cate->image }}">
                                    <h3 class="category-title">{{ $cate->name }}</h3>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex justify-content-between mb-5">

                        <h2 class="section-title">Newly Arrived Brands</h2>

                        {{-- <div class="d-flex align-items-center">
                            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev brand-carousel-prev btn btn-yellow">❮</button>
                                <button class="swiper-next brand-carousel-next btn btn-yellow">❯</button>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="brand-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach ($newItems as $newItem)
                                <div class="swiper-slide">
                                    <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src='storage/productImages/{{ $newItem->image }}'
                                                    class="img-fluid rounded" alt="Card title">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body py-0">
                                                    <p class="text-muted mb-0">{{ $newItem->name }}</p>
                                                    <h5 class="card-title">{{ $newItem->description }}</h5>
                                                </div>
                                            </div>
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


    <section class="py-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="bootstrap-tabs product-tabs">
                        <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                            <h3>Trending Products</h3>
                            <nav>
                                {{-- <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link text-uppercase fs-6 active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button">All</a>
                    <a class="nav-link text-uppercase fs-6" id="nav-fruits-tab" data-bs-toggle="tab" data-bs-target="#nav-fruits" type="button">Fruits & Veges</a>
                    <a class="nav-link text-uppercase fs-6" id="nav-juices-tab" data-bs-toggle="tab" data-bs-target="#nav-juices" type="button">Juices</a>
                  </div> --}}
                            </nav>
                        </div>
    
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                aria-labelledby="nav-all-tab">

                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                    {!! Form::open(['method' => 'POST', 'data-action' => route('cart')]) !!}
                                    @foreach ($products as $product)
                                        <div class="col">
                                            <div class="product-item">
                                                <button  type="button" class="wish btn-wishlist" id="{{'btn'.$product->id }}">
                                                <svg width="24"
                                                        height="24">
                                                        <use xlink:href="#heart"></use>
                                                    </svg></button>
                                                <figure>
                                                    <a href="{{ url('product/' . $product->urlslug) }}"
                                                        title="Product Title">
                                                        <img src="storage/productImages/{{ $product->image }}"
                                                            class="tab-image">
                                                    </a>
                                                </figure>
                                                                                                       
                                                @if ($product->stock_quantity != null)
                                                {!! Form::hidden('stockquantity', $product->stock_quantity,['id'=>'stockquantity']) !!}
                                                <h3>{{ $product->name }}<span class="qty">{{ '('.$product->stock_quantity . ' Unit)' }}</span></h3>
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
                                                        {{-- {{ dd(isset($quantity[$product->id])) }} --}}
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
                                                           
                                                $('.wish').click(function(){
                                                    // var id=$('.ids').val();
                                                     var product_id = $(this).parents('.product-item').find('#product_id').val();
                                                      $.ajax({
                                                        url:"/add-wishlist/"+product_id,
                                                        type:'GET',
                                                        data:{
                                                        _token:"{{csrf_token()}}",
                                                        },  
                                                        success:function(response){
                                                            console.log('#btn'+response.id);
                                                            var id='#btn'+response.id;
                                                            $(id).css('background-color','#F03838')
                                                            .css('color','white');                                                         
                                                        },
                                                            fail:function(){
                                                                console.log('failed');
                                                            }
                                                        });
                                                 });                                                
                                    </script>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <div class="banner-ad bg-danger"
                        style="background: url('images/ad-image-3.png');background-repeat: no-repeat;background-position: right bottom;">
                        <div class="banner-content p-5">

                            <div class="categories text-primary fs-3 fw-bold">Upto 25% Off</div>
                            <h3 class="banner-title">Luxa Dark Chocolate</h3>
                            <p>Very tasty & creamy vanilla flavour creamy muffins.</p>
                            <a href="#" class="btn btn-dark text-uppercase">Show Now</a>

                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-ad bg-info"
                        style="background: url('images/ad-image-4.png');background-repeat: no-repeat;background-position: right bottom;">
                        <div class="banner-content p-5">

                            <div class="categories text-primary fs-3 fw-bold">Upto 25% Off</div>
                            <h3 class="banner-title">Creamy Muffins</h3>
                            <p>Very tasty & creamy vanilla flavour creamy muffins.</p>
                            <a href="#" class="btn btn-dark text-uppercase">Show Now</a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex justify-content-between my-5">

                        <h2 class="section-title">Best selling products</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                                <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="products-carousel swiper">
                        <div class="swiper-wrapper">

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-tomatoes.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-tomatoketchup.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-bananas.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-bananas.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>
                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-tomatoes.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-tomatoketchup.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-bananas.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-bananas.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- / products-carousel -->

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-fluid">

            <div class="bg-secondary py-5 my-5 rounded-5"
                style="background: url('images/bg-leaves-img-pattern.png') no-repeat;">
                <div class="container my-5">
                    <div class="row">
                        <div class="col-md-6 p-5">
                            <div class="section-header">
                                <h2 class="section-title display-4">Get <span class="text-primary">25% Discount</span> on
                                    your first purchase</h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictumst amet, metus, sit massa
                                posuere maecenas. At tellus ut nunc amet vel egestas.</p>
                        </div>
                        <div class="col-md-6 p-5">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control form-control-lg" name="name"
                                        id="name" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-lg" name="email"
                                        id="email" placeholder="abc@mail.com">
                                </div>
                                <div class="form-check form-check-inline mb-3">
                                    <label class="form-check-label" for="subscribe">
                                        <input class="form-check-input" type="checkbox" id="subscribe"
                                            value="subscribe">
                                        Subscribe to the newsletter</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex justify-content-between">

                        <h2 class="section-title">Just arrived</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                                <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="products-carousel swiper">
                        <div class="swiper-wrapper">

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-tomatoes.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-tomatoketchup.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-bananas.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-bananas.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>
                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-tomatoes.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-tomatoketchup.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-bananas.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                            <div class="product-item swiper-slide">
                                <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="product-single.html" title="Product Title">
                                        <img src={{ asset('images/thumb-bananas.png') }} class="tab-image">
                                    </a>
                                </figure>
                                <h3>Sunstar Fresh Melon Juice</h3>
                                <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                        height="24" class="text-primary">
                                        <use xlink:href="#star-solid"></use>
                                    </svg> 4.5</span>
                                <span class="price">$18.00</span>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="input-group product-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="quantity"
                                            class="form-control input-number" value="10" min="1"
                                            max="100">
                                        <span class="input-group-btn">
                                            <button type="button"
                                                class="quantity-right-plus btn btn-success btn-number" data-type="plus"
                                                data-field="">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                    <a href="#" class="nav-link">Add to Cart <iconify-icon
                                            icon="uil:shopping-cart"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- / products-carousel -->

                </div>
            </div>
        </div>
    </section>

    <section id="latest-blog" class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header d-flex align-items-center justify-content-between my-5">
                    <h2 class="section-title">Our Recent Blog</h2>
                    <div class="btn-wrap align-right">
                        <a href="#" class="d-flex align-items-center nav-link">Read All Articles <svg
                                width="24" height="24">
                                <use xlink:href="#arrow-right"></use>
                            </svg></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img src={{ asset('images/post-thumb-1.jpg') }} alt="post" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date"><svg width="16" height="16">
                                        <use xlink:href="#calendar"></use>
                                    </svg>22 Aug 2021</div>
                                <div class="meta-categories"><svg width="16" height="16">
                                        <use xlink:href="#category"></use>
                                    </svg>tips & tricks</div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">Top 10 casual look ideas to dress up
                                        your kids</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim
                                    tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img src={{ asset('images/post-thumb-2.jpg') }} alt="post" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date"><svg width="16" height="16">
                                        <use xlink:href="#calendar"></use>
                                    </svg>25 Aug 2021</div>
                                <div class="meta-categories"><svg width="16" height="16">
                                        <use xlink:href="#category"></use>
                                    </svg>trending</div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">Latest trends of wearing street wears
                                        supremely</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim
                                    tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img src={{ asset('images/post-thumb-3.jpg') }} alt="post" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date"><svg width="16" height="16">
                                        <use xlink:href="#calendar"></use>
                                    </svg>28 Aug 2021</div>
                                <div class="meta-categories"><svg width="16" height="16">
                                        <use xlink:href="#category"></use>
                                    </svg>inspiration</div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">10 Different Types of comfortable
                                        clothes ideas for women</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim
                                    tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
