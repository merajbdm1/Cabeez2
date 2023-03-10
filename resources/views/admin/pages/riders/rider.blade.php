@extends('admin.layout.master')
@section('style')
@endsection
<style>
    nav svg {
        max-height: 10px;
    }
</style>
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Riders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Riders</li>
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
                <div class="col-md-12">
                    @if ($message = Session::get('RiderDetailSuccess'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif @if ($message = Session::get('RiderDetailError'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <!-- jquery validation -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Riders</h3>

                            <?php 
                            $check_role= Session::get('role');
                            $data = \App\Models\AllDataTableRolesAndPermission::get();
                            foreach($data as $item)
                            {
                             $check_role_name = $item->role_name;
                              foreach ($item->riders_permissions as $value) 
                              {
                                   if($value == 'Add')//Users
                                   {
                                    $checkAdd = $value;
                                    
                                    if($check_role == $check_role_name && $checkAdd)
                                      { 
    
                                  ?>
                                  <li class="list-unstyled">
                                    <a type="button"  href="{{ url('admin/add_riders') }}" class="btn btn-default float-right bg-primary">
                                         Add Rider
                                    </a>
                                  </li>
                             <?php }   } } }?>

                             <?php 
                             $check_role= Session::get('status');
                     
                                     if($check_role == '1')//develeoper mode
                                       { 
                                   ?>
                                   <li class="list-unstyled">
                                    <a type="button"  href="{{ url('admin/add_riders') }}" class="btn btn-default float-right bg-primary">
                                         Add Rider
                                    </a>
                                  </li>
                              <?php }  ?>

                              
                        </div>
                        {{-- <div class=" row p-3">
                            <div class="col-md-4">

                                <form action="{{ route('rider_review') }}" method="GET">
                                    <div class="form_group">
                                        <label for="">From Date</label>
                                        <input type="date" name="fromDate" value="{{ request('fromDate') }}"
                                            class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                    <br>
                                            <div class="form_group">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                                <a href="{{ url('admin/riders') }}" class="btn btn-danger">Clear</a>
                                            </div>
                                
                                            </div>

                                            <div class=" col-md-4">

                                            
                                                    <div class="form_group">

                                                        <label for="">To Date</label>
                                                        <input type="date" name="toDate" value="{{ request('toDate') }}"
                                                            class="form-control" placeholder="dd/mm/yyyy">

                                                    </div>
                                                
                                                

                                            </div>

                                          <div class="col-md-4">

                              
                                         <div class="form_group">


                                        <label for="">Rider Name</label>
                                        <input type="text" name="search" value="{{ request('search') }}"
                                            class="form-control" placeholder="Rider Name">
                                        </div>
                                   
                                </form>

                            </div>
                        </div> --}}

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped " id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Rider ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email Address</th>
                                        <th>Mobile No</th>
            
                                        <th>Account Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $riders as $key=>$ride)
                                    <tr>
                                    <td>{{ ($riders->currentpage()-1) * $riders->perpage() + $key + 1 }}</td>
                                    <td>{{ $ride->rider_id}}</td>
                                    <td>{{ $ride->f_name }}</td>
                                    <td>{{ $ride->l_name }}</td>
                                    <td>{{ $ride->email }}</td>
                                    <td>{{ $ride->contact }}</td>
                                   

                                    <td>
                                        @if ($ride->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $ride->created_at }}</td>
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">

                                                        {{-- <?php 
                                                            $check_role= Session::get('role');
                                                            $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                            foreach($data as $item)
                                                            {
                                                             $check_role_name = $item->role_name;
                                                              foreach ($item->riders_permissions as $value) 
                                                              {
                                                                   if($value == 'View')//User
                                                                   {
                                                                    $checkAdd = $value;
                                                                    
                                                                    if($check_role == $check_role_name && $checkAdd)
                                                                      { 
                                    
                                                                  ?>
                                                                  <li class="list-unstyled">
                                                                    <a href="#" class="btn btn-info"><i
                                                                        class="fas fa-eye"></i></a>
                                                                  </li>
                                                             <?php }   } } }?> --}}

                                                             <?php 
                                                             $check_role= Session::get('status');
                                                     
                                                                     if($check_role == '1')//Developer
                                                                       { 
                                                                   ?>
                                                                   <li class="list-unstyled">
                                                                    <a href="#" class="btn btn-info"><i
                                                                        class="fas fa-eye"></i></a>
                                                                  </li>
                                                              <?php }  ?>

                                                              

                                                             <?php 
                                                            $check_role= Session::get('role');
                                                            $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                            foreach($data as $item)
                                                            {
                                                             $check_role_name = $item->role_name;
                                                              foreach ($item->riders_permissions as $value) 
                                                              {
                                                                   if($value == 'Edit')//User
                                                                   {
                                                                    $checkAdd = $value;
                                                                    
                                                                    if($check_role == $check_role_name && $checkAdd)
                                                                      { 
                                    
                                                                  ?>
                                                                  <li class="list-unstyled">
                                                                    <a href="{{ url('admin/edit_rider', $ride->_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                  </li>
                                                             <?php }   } } }?>
                                                            
                                                             <?php 
                                                             $check_role= Session::get('status');
                                                     
                                                                     if($check_role == '1' || $check_role == '2')//Developern and super admin
                                                                       { 
                                                                   ?>
                                                                   <li class="list-unstyled">
                                                                    <a href="{{ url('admin/edit_rider', $ride->_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                  </li>
                                                              <?php }  ?>

                                                              
                                                              <?php 
                                                              $check_role= Session::get('status');
                                                      
                                                                      if($check_role == '1' || $check_role == '2')//Developern and super admin

                                                                        { 
                                                                    ?>

                                                                   <li class="list-unstyled">
                                                                    <a href="{{ url('admin/delete_rider', $ride->_id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                   </li>
                                                             <?php }  ?>
                                        </div>
                                     </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <br>
                            {{ $riders->links() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection

@section('script')
<script>
    var loadFile2 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id2');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>


@endsection