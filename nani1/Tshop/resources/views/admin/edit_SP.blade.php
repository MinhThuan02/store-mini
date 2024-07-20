@extends('layout-admin')

@section('home-admin')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Sửa Sản Phẩm</h1>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3>Sửa Sản Phẩm</h3>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    @foreach($edit_SP as $edit)
                    <form action="{{ URL::to('/update-product/' . $edit->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $edit->name }}" placeholder="Nhập tên Sản Phẩm" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá Sản Phẩm</label>
                            <input type="number" class="form-control" name="price" id="price" value="{{ $edit->price }}" placeholder="Giá Sản Phẩm" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số Lượng</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $edit->quantity }}" placeholder="Số Lượng" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Mô Tả Sản Phẩm</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Mô Tả Sản Phẩm" style="height: 200px" required>{{ $edit->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Số Lượng Sản Phẩm</label>
                            <textarea class="form-control" name="sold" id="sold" placeholder="số lượng" style="height: 200px" required>{{ $edit->sold }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">Hình Ảnh Sản Phẩm</label>
                            <input type="file" class="form-control" name="img" id="img">
                            <img src="{{ URL::to('public/uploads/product/'.$edit->img) }}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Quốc Gia</label>
                            <select class="form-control" name="brand_id" id="brand_id" required>

                                @foreach($all_brand as $brand)
                                <option value="{{ $brand->brand_id }}" {{ $brand->brand_id == $edit->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Danh Mục</label>
                            <select class="form-control" name="categories_id" id="categories_id" required>

                                @foreach($all_cate as $cate)
                                <option value="{{ $cate->id }}" {{ $cate->id == $edit->category_id ? 'selected' : '' }}>{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Hiển Thị</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="0" {{ $edit->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                <option value="1" {{ $edit->status == 1 ? 'selected' : '' }}>Hiện</option>
                            </select>
                        </div>
                        <button type="submit" name="update_product" class="btn btn-primary">Cập Nhật</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
@endsection
