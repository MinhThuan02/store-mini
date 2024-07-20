@extends('layout-admin')

@section('home-admin')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Cập Nhật Danh Mục</h1>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3>Thêm Danh Mục</h3>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        {{ Session::put('message', null) }}
                    @endif

                    @foreach($edit_categories as $edit_value)
                    <form action="{{ URL::to('/update-categories/' . $edit_value->id) }}" method="post">
                        {{ csrf_field() }}
                       
                        <div class="form-group">
                            <label for="name">Tên Danh Mục</label>
                            <input type="text" value="{{ $edit_value->name }}" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô Tả Danh Mục</label>
                            <input type="text" class="form-control" value="{{ $edit_value->description }}" name="description" id="description" placeholder="Nhập mô tả danh mục">
                        </div>
                        
                        <button type="submit" name="update_categories" class="btn btn-primary">Cập Nhật</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
@endsection
