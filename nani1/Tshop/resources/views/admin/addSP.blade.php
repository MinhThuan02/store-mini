@extends('layout-admin')

@section('home-admin')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Thêm Danh Mục</h1>

    <div class="row">
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3>Thêm Danh Mục</h3>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        {{ Session::put('message', null) }}
                    @endif
                    <form action="{{ URL::to('/save-product') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá Sản Phẩm</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Giá Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số Lượng</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Số Lượng">
                        </div>
                        <div class="form-group">
                            <label for="quantity">đã bán</label>
                            <input type="number" class="form-control" name="sold" id="sold">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô Tả Sản Phẩm</label>
                            <input type="text" style="height: 200px" class="form-control" name="description" id="description" placeholder="Mô Tả Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="img">Hình Ảnh Sản Phẩm</label>
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                        <div class="form-group">
                            <label for="categories_id">Quốc Gia</label>
                            <select class="form-control" name="brand_id" id="brand_id">
                                <option value="0">------</option>
                               @foreach($all_brand as $brand)
                                <option value="{{ $brand->brand_id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories_id">Danh Mục</label>
                            <select class="form-control" name="categories_id" id="categories_id">
                                <option value="0">------</option>
                                @foreach($all_cate as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Hiển Thị</label>
                            <select class="form-control" name="status" id="status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-primary">Lưu</button>
                    </form>

                </div>
            </div>

            <!-- Brand Buttons -->

        </div>

        <div class="col-lg-3"></div>
    </div>

</div>
@endsection
