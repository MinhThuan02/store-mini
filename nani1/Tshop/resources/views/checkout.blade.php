@extends('layout')

<!-- @section('title','Welcome to Tshop')

@section('title2','hehehe') -->

@section('home')

<div class="container">
             <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{-- <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code --}}
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Thanh Toán</h4>
                <form action="{{URL::to ('/save-checkout')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Họ và Tên<span>*</span></p>
                                        <input type="text" name="shipping_name">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="shipping_address" placeholder="Street Address" class="checkout__input__add">

                            </div>



                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="phone" name="shipping_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="shipping_email">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Thanh Toán khi nhận hàng
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}


                            <div class="checkout__input">
                                <p>Ghi chú thêm<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery." name="shipping_note">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Sản phẩm đã mua</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Thành tiền</span></div>
                                <ul>
                                    @foreach($cartCollection as $item)
                                    <li>{{ $item->name }} <span>{{ number_format($item->price * $item->quantity, 0, '.', '.') }} VND</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">
                                    Tổng <span>{{ number_format($cartCollection->sum('price'), 0, '.', '.') }} VND</span>
                                </div>
                                <div class="checkout__order__total">
                                    Thanh toán <span>{{ number_format($cartCollection->sum(function($item) {
                                        return $item->price * $item->quantity;
                                    }), 0, '.', '.') }} VND</span>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Xác nhận</button>
                            </div>
                        </div>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


        </div>
@endsection
