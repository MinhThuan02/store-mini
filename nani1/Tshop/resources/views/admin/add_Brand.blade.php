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
                    <h3>Thêm Brand</h3>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        {{ Session::put('message', null) }}
                    @endif
                    <form action="{{ URL::to('/save-add-brand') }}" method="post">
                        {{ csrf_field() }}
                       
                        <div class="form-group">
                            <label for="name">Loại Brand  </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô Tả Brand</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Nhập mô tả danh mục">
                        </div>
                        <div class="form-group">
                            <label for="status">Hiển Thị</label>
                            <select class="form-control" name="status" id="status">1
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            </select>
                        </div>
                        <button type="submit" name="add_Brand" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>

            <!-- Brand Buttons -->
            
        </div>

        <div class="col-lg-3"></div>
    </div>

</div>
@endsection
