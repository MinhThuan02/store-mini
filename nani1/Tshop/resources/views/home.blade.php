@extends('layout')

<!-- @section('title','Welcome to Tshop')

@section('title2','hehehe') -->

@section('home')

<div class="container">
             <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                            <h5><a href="#">Trái cây tươi</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                            <h5><a href="#">Hoa quả sấy khô</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                            <h5><a href="#">Rau củ</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                            <h5><a href="#">Nước ép</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="#">Thịt tươi</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm Mới Cặp Nhật</h2>
                    </div>
                    {{-- <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products_HM as $sp)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('/')}}public/uploads/product/{{$sp->img}}">

                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>

                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('detail', $sp->id ) }}">{{ $sp->name }}</a></h6>
                            <h5>{{ number_format($sp->price, 0, ',', '.') }} VND</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Trái Cây</h2>
                    </div>
                    {{-- <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products_health as $sp)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('/')}}public/uploads/product/{{$sp->img}}">

                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>

                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('detail', $sp->id ) }}">{{ $sp->name }}</a></h6>
                            <h5>{{ number_format($sp->price, 0, ',', '.') }} VND</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Thịt Cá Trứng</h2>
                    </div>
                    {{-- <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products_cate as $sp)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('/')}}public/uploads/product/{{$sp->img}}">

                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>

                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('detail', $sp->id ) }}">{{ $sp->name }}</a></h6>
                            <h5>{{ number_format($sp->price, 0, ',', '.') }} VND</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('/')}}img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach($products->chunk(3) as $productChunk)
                                <div class="latest-product__slider__item">
                                    @foreach($productChunk as $sp_new)
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('/')}}public/uploads/product/{{ $sp_new->img }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $sp_new->name }}</h6>
                                                <span>{{number_format ($sp_new->price) }} VND</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Đồ Japan</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach($products_jp->chunk(3) as $productChunk)
            <div class="latest-product__slider__item">
                @foreach($productChunk as $sp_new)
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="{{asset('/')}}public/uploads/product/{{ $sp_new->img }}" alt="{{ $sp_new->name }}">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>{{ $sp_new->name }}</h6>
                            <span>{{number_format ($sp_new->price) }} VND</span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Thịt</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach($products_cate->chunk(3) as $productChunk)
                            <div class="latest-product__slider__item">
                                @foreach($productChunk as $sp_new)
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('/')}}public/uploads/product/{{ $sp_new->img }}" alt="{{ $sp_new->name }}">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $sp_new->name }}</h6>
                                            <span>{{number_format ($sp_new->price) }} VND</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin Tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> Ngày 4 tháng 5, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 5 bình luận</li>
                            </ul>
                            <h5><a href="#">Mẹo nấu ăn đơn giản hóa việc nấu nướng</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> Ngày 4 tháng 5, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 5 bình luận</li>
                            </ul>
                            <h5><a href="#">6 cách chuẩn bị bữa sáng cho 30 người</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> Ngày 4 tháng 5, 2019</li>
                                <li><i class="fa fa-comment-o"></i> 5 bình luận</li>
                            </ul>
                            <h5><a href="#">Thăm trang trại sạch ở Mỹ</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        </div>
@endsection
