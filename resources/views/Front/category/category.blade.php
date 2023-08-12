@extends('Front.layout.navbarandfooter')
@section('main')

<section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <h2 class="section-title">All categories</h2>
        <div class="row">
            @foreach($category as $cate)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="category-carousel swiper">
                            <a href="{{ url('categories/'.$cate->name) }}" class="nav-link category-item swiper-slide">
                                <img src="storage/images/{{ $cate->image }}">
                                <h3 class="category-title">{{ $cate->name }}</h3>
                            </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
