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

                        <div class="card-body">
                            <table class="table table-bordered table-striped " id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>FIRST NAME</th>
                                        <th>LAST NAME</th>
                                        <th>EMAIL</th>
                                        <th>PHONE</th>

                                        <th>ACCOUNT STATUS</th>
                                        <th>CREATED AT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>

                                    @php
                                        $i=1;
                                    @endphp

                                <tbody>
                                    @foreach( $viewrid as $key=>$ride)
                                    <tr>
                                    <td>{{ $i++}}</td>

                                    <td>{{ $ride->first_name }}</td>
                                    <td>{{ $ride->last_name }}</td>
                                    <td>{{ $ride->email }}</td>
                                    <td>{{ $ride->phone_number }}</td>


                                    <td>
                                        @if ($ride->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @elseif($ride->status == 'inactive')
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif($ride->status == 'pending')
                                            <span class="badge badge-info">Pending</span>
                                        @else
                                          <span class="badge badge-danger">Deleted</span>
                                        @endif
                                    </td>
                                    <td>{{ $ride->created_at }}</td>
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">



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
                                                                    <a href="{{ url('admin/delete_rider', $ride->_id) }}" onclick="return confirm('Are you sure you want to delete this Fare?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                   </li>
                                                             <?php }  ?>
                                        </div>
                                     </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <br>

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
