@extends('layout')
@section('title', 'Welcome to HPXShop')

@section('home')
<div class="container">
  <div class="row">
    <div class="col-sm-12 text-center">
      <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" alt="User Icon" class="img-fluid" style="max-width: 100px;">
      <p>Chỉnh sửa hồ sơ <a href="/edit"><i class="fa-solid fa-pen-to-square"></i></a></p>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-3">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Thông Tin Cá Nhân</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Đơn Hàng</a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
        <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
          <h5>Họ và Tên: Nguyễn Minh Thuận</h5>
          <p>Email: T******.com</p>
          <p>Số điện thoại: *********02</p>
          <p>Giới tính: Nam</p>
          <p>Ngày sinh: 01/01/1990</p>
          <button class="btn btn-primary">Lưu</button>
          
        </div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
          <h5>Đơn Hàng Đã Giao</h5>
          <div class="order-item border p-3 mb-3">
            <div class="row">
              <div class="col-md-8">
                <div>Đơn hàng: #12345678</div>
                <div>Ngày đặt: 20/04/2024</div>
                <div>Sản phẩm: Tên sản phẩm ABC</div>
                <div>Số lượng: 1</div>
                <div>Giá: 500.000₫</div>
              </div>
              <div class="col-md-4 text-right">
                <div>Trạng thái: Đã giao</div>
                <div>Ngày giao: 25/04/2024</div>
                <button class="btn btn-outline-primary mt-2">Xem chi tiết</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
      </div>
    </div>
  </div>
</div>
@endsection
