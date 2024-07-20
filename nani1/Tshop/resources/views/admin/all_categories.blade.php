@extends('layout-admin')

@section('home-admin')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                           
                            <th>Name</th>
                           
                           
                            <th>Hiển Thị</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($all_categories as $key => $all)
                        <tr>
                            
                            <td>{{$all->name	}}</td>
                            <td>
                                <?php
                                if($all->status == 0){
                                    ?>
                                     <a href="{{URL::to('/unactive-categories/'.$all->id)}}"><span>
                                        <i class="fa-solid fa-toggle-off" style=" color: #e11414;"></i>
                                        </span></a>
                                <?php
                                 }else {
                                  ?>
                               
                                     <a href="{{URL::to('/active-categories/'.$all->id)}}"> <span> <i class="fa-solid fa-toggle-on" style="color: #74C0FC;"></i></span></a>
                                
                         <?php
                                 }
                                 ?>
                      
                            </td>
                           
                            <td>
                                <a href="{{URL::to('/edit-categories/'.$all->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('Bạn Chắc Chứ')" href="{{ URL::to('/delete-categories/' . $all->id) }}"><i class="fa-solid fa-trash"></i></a>

                            </td>
                       

                               
                                    
                              
                          
                           
                            
                        </tr>
                        @endforeach
                        
                        
                        <!-- More rows as needed -->
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
