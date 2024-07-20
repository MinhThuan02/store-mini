@extends('layout')

@section('title', 'Welcome to HPXShop')

@section('home')
<div class="container">
  <div class="row">
    <div class="col-sm-12 text-center">
      <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" alt="User Icon" class="img-fluid" style="max-width: 100px;">
      <p>Chỉnh sửa hồ sơ <button><i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></button></p>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-3">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Thông Tin Cá Nhân</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Đơn Hàng</a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Voucher</a>
        <a href="/" class="list-group-item" >Đăng xuất</a>
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
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Thông Tin Cá Nhân</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="fullName" class="form-label">Họ và Tên</label>
            <input type="text" class="form-control" id="fullName" value="Nguyễn Minh Thuận">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="T******.com">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="number" class="form-control" id="phone" value="*********02">
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">Giới tính</label><br>
            <input type="radio" id="male" name="gender" value="Nam" checked>
            <label for="male">Nam</label><br>
            <input type="radio" id="female" name="gender" value="Nữ">
            <label for="female">Nữ</label><br>
          </div>
          
          <div class="mb-3">
            <label for="dob" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" id="dob" value="01/01/1990">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary">Lưu Thay Đổi</button>
      </div>
    </div>
  </div>
</div>
@endsection
