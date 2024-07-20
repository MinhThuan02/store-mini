@extends('layout')

@section('home')
<div class="container">
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh Mục</h4>
                            <ul>
                                @foreach($categories as $dm)
                                    <li class="{{ request()->is('categories/' . $dm->id) ? 'active' : '' }}">
                                        <a href="{{ route('categories', $dm->id) }}">{{ $dm->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sản Phẩm</h2>
                        </div>
                        <div class="row">
                            @foreach($products as $sp)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('/')}}public/uploads/product/{{$sp->img}}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="{{ route('detail', $sp->id ) }}">{{$sp->name}}</a></h6>
                                            <div class="product__item__price">{{ number_format($sp->price, 0, '.', '.') }} VND</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="product_pagination">
                            {{ $products->links('product_pagination') }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
