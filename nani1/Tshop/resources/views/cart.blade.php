@extends('layout')

@section('home')
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Tên Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartCollection as $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('public/uploads/product/' . $item->attributes->img) }}" alt="{{ $item->name }}" style="width:50px">
                                        <h5>{{ $item->name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($item->price, 0, '.', '.') }} VND
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <button class="qtybtn2 dec" data-id="{{ $item->id }}">-</button>
                                            <input type="text" name="quantity" value="{{ $item->quantity }}" class="quantity2" data-id="{{ $item->id }}">
                                            <button class="qtybtn2 inc" data-id="{{ $item->id }}">+</button>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ number_format($item->price * $item->quantity, 0, '.', '.') }} VND
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <form action="{{ route('remove', ['id' => $item->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="icon_close"></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Update Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>{{ number_format(Cart::getSubTotal(), 0, '.', '.') }} VND</span></li>
                            <li>Total <span>{{ number_format(Cart::getTotal(), 0, '.', '.') }} VND</span></li>
                        </ul>
                        <a href="{{URL::to ('/checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $('.qtybtn2').on('click', function() {
        var $button = $(this);
        var oldValue = $button.siblings('input').val();
        var id = $button.data('id');
        var newVal;

        if ($button.hasClass('inc')) {
            newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below 1
            if (oldValue > 1) {
                newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }

        $button.siblings('input').val(newVal);

        $.ajax({
            url: '{{ route("update_cart") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: newVal
            },
            success: function(response) {
                location.reload();
            }
        });
    });
});
</script>
@endsection
