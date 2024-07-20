@extends('layout')

<!-- @section('title','Welcome to Tshop')

@section('title2','hehehe') -->

@section('home')


<div class="container">
       <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện thoại</h4>
                        <p>0332325202</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>121 bến vân đồn p9 quận 4</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Mở cửa</h4>
                        <p>09:00 sáng tới 10:00 tối</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>thuannguyen.5202@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.617026769285!2d106.69546999111188!3d10.763970032060936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f6b31edc447%3A0xe0127b9d4fe806be!2zMTIxIMSQLiBC4bq_biBWw6JuIMSQ4buTbiwgUGjGsOG7nW5nIDksIFF14bqtbiA0LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2sbd!4v1715846698779!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Hồ Chí Minh</h4>
                <ul>
                    <li>Điện thoại: 0332325202</li>
                    <li>địa chỉ: 121 bến vân đồn p9 q4</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Liên hệ với Shop</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Họ Tên">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Nhập nội dung"></textarea>
                        <button type="submit" class="site-btn">Gửi tin nhắn</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->



        </div>

     
@endsection
