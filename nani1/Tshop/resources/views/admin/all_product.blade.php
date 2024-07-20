@extends('layout-admin')

@section('home-admin')
<div class="container-fluid">
    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản Lí Sản Phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    {{ Session::put('message', null) }}
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                           
                            <th>Tên Sản Phẩm</th>
                            <th>Danh Mục</th>
                            <th>Quốc Gia</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th>Hiển Thị</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_product as $key => $product)
                        <tr>
                           
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->brand_name }}</td>
                            <td><img src="{{ asset('public/uploads/product/' . $product->img) }}" height="70px" width="70px"></td>
                            <td>{{number_format( $product->price) }}</td>
                            <td>
                                @if($product->status == 0)
                                    <a href="{{ URL::to('/unactive-brand/' . $product->id) }}"><span><i class="fa-solid fa-eye"></i></span></a>
                                @else
                                    <a href="{{ URL::to('/active-brand/' . $product->id) }}"><span><i class="fa-solid fa-eye-slash"></i></span></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::to('/edit-product/' . $product->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('Bạn Chắc Chứ')" href="{{ URL::to('/delete-product/' . $product->id) }}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- More rows as needed -->
                    </tbody>
                </table>
                <div class="product_pagination">
                    {{ $all_product->links('product_pagination') }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
