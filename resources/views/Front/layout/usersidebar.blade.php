
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="{{ asset('css/Front_css/cartpage.css') }}">
    <!-- Button trigger modal -->
    <div class="container">
        <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link align-middle px-0 text-dark">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{url('view-coupons')}}" class="nav-link align-middle px-0 align-middle {{ Request::is('view-coupons')?'text-primary':'' }}">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Coupon</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('view-profile')}}" id="address" class="nav-link px-0 align-middle {{ Request::is('view-profile')?'text-primary':'' }}">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Profile</span> </a>
                        </li>
                        <li>
                            <a href="{{ url('orders') }}" id="orders" class="nav-link px-0 align-middle p-2  {{ Request::is('orders')?'text-primary':'' }}">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders </span></a>
                        </li>

                        <li>
                            <a href="{{ url('customer-address') }}" id="address" class="nav-link px-0 align-middle {{ Request::is('customer-address')?'text-primary':'' }}">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Address</span> </a>
                        </li>
                        <li>
                            <a href="{{url('view-wishlist')}}" id="address" class="nav-link px-0 align-middle {{ Request::is('view-wishlist')?'text-primary':'' }}">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Wishlist</span> </a>
                        </li>
                    </ul>
                    <hr>

                </div>
            </div>            
<style>
    .nav-link{
        font-weight:bold;
    }
</style>
