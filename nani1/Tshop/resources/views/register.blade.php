@extends('layout')

<!-- @section('title','Welcome to Tshop')

@section('title2','hehehe') -->

@section('home')

<div class="container">
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-custom text-white" style="border-radius: 1rem;">
                    <style>
                        /* Thêm đoạn mã CSS tùy chỉnh */
                        .bg-custom {
                            background-color: #7fad39; /* Màu nền mới */
                        }
                    </style>
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Register</h2>

                            @if(Session::has('message'))
                        <div class=" alert alert-danger">{{Session::get('message')}}</div>
                        @php
                            Session::forget('message');
                        @endphp
                            
                        @endif
                            
                            <form action="" method="POST" class="form-login">
                                {{ csrf_field() }}

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="text" class="form-control form-control-lg" placeholder="Điền email" name="name" />
                                    <label class="form-label text-white" for="typeEmailX">Họ Tên</label>
                                </div>
                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="text" class="form-control form-control-lg" placeholder="Điền email" name="email" />
                                    <label class="form-label text-white" for="typeEmailX">Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="password"  class="form-control form-control-lg" placeholder="Điền password" name="password" />
                                    <label class="form-label text-white" for="typePasswordX">Password</label>
                                </div>
                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="password"  class="form-control form-control-lg" placeholder="Điền password" name="repassword" />
                                    <label class="form-label text-white" for="typePasswordX">Nhập lại password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                            </form>

                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="/register" class="text-white-50 fw-bold">Sign Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

@endsection
