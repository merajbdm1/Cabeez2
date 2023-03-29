@extends('admin.layout.master')
@section('style')
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settlement</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Settlement</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-4">
                   
                    <!-- jquery validation -->


            

                    {{-- <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Promo Code</small></h3>

                        </div>
                        <!-- /.card-header -->
                        <!--  form start -->
                       
                    </div> --}}

               


                 
                         
                {{--                                 
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Promo Code</small></h3>

                        </div>
                        <!-- /.card-header -->
                        <!--  form start -->
                       
                            </div> --}}

                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Settlement</h3>
                            <!-- <button type="button" class="btn btn-default float-right bg-primary" data-toggle="modal" data-target="#modal-lg">
                                Add Promocode
                            </button> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Driver Name</th>
                                        
                                        <th>Driver ID</th>
                                        <th>Total cash</th>
                                        <th>Action</th>
                                       

                                    </tr>
                                </thead>
                              
                             
                                    
                               

                                <tbody>
                                    @foreach ($driver as $item2)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$item2->first_name}}</td>
                                        <td>rtgd</td>
                                        <td>rvbhtgdg</td>
                                        <td>grd</td>
                                       
                                      
                                      
                                        {{-- <td class="text-center py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                            <!-- <a href="{{ url('admin/delete_driver', ) }}" class="btn btn-info"><i class="fas fa-eye"></i></a> -->             
                                            <li class="list-unstyled">
                                                 <a href="{{ url('admin/delete_promocode', ) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </li>       
                                            </div>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                             
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>



@endsection

@section('script')
@endsection