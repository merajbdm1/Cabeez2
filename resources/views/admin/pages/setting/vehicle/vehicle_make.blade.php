@extends('admin.layout.master')
@section('style')
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
    integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vehicle Category</li>
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
                    @if($message = Session::get('VehicleMakeSuccess'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div> @endif @if($message = Session::get('VehicleMakeError')) <div
                            class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div> @endif
                        <!-- jquery validation -->


                        @if(isset($edit_vehicleMake))
                        <?php
                        $check_role= Session::get('role');
                        $data = \App\Models\AllDataTableRolesAndPermission::get();
                        foreach($data as $item)
                        {
                         $check_role_name = $item->role_name;
                          foreach ($item->vehicle_make_permissions as $value)
                          {
                               if($value == 'Edit') //Users
                               {
                                $checkAdd = $value;

                                if($check_role == $check_role_name && $checkAdd)
                                  {

                              ?>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Vehicle Make</small></h3>

                                </div>
                                <!-- /.card-header -->
                                <!--  form start -->
                                <form id="quickForm"
                                    action="{{ url('admin/vehicle/update_make',$edit_vehicleMake->_id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Make <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name"
                                                        value="{{ $edit_vehicleMake->name }}"
                                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                        id="name" placeholder="Make">
                                                        @if ($errors->has('name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select id="status" class="form-control custom-select"
                                                        name="status">
                                                        @if ($edit_vehicleMake->status == 'active')
                                                        <option value="{{ $edit_vehicleMake->status }}"
                                                            {{ $edit_vehicleMake->status === $edit_vehicleMake->status? 'active' : 'inactive' }}>Active</option>
                                                        <option value="active">Inactive</option>
                                                        @elseif ($edit_vehicleMake->status == 'inactive')
                                                        <option value="{{ $edit_vehicleMake->status }}"
                                                            {{ $edit_vehicleMake->status === $edit_vehicleMake->status? 'inactive' : 'active' }}>Inactive</option>
                                                        <option value="inactive">Active</option>
                                                        @endif
                                                    </select>
                                                    @if($errors->has('vehicle_make_status'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('vehicle_make_status') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <?php } } } }?>


                            <?php
                            $check_role= Session::get('status');

                                    if($check_role == '1')//developer
                                      {
                                        ?>
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Edit Vehicle Make</small></h3>

                                            </div>
                                            <!-- /.card-header -->
                                            <!--  form start -->
                                            <form id="quickForm"
                                                action="{{ url('admin/vehicle/update_make',$edit_vehicleMake->_id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name">Make <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="name"
                                                                    value="{{ $edit_vehicleMake->name }}"
                                                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                                    id="name" placeholder="Make">
                                                                    @if ($errors->has('name'))
                                                                    <span class="invalid feedback" role="alert">
                                                                        <strong>{{ $errors->first('name') }}.</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <select id="status" class="form-control custom-select" name="status">
                                                                @if ($edit_vehicleMake->status == 'active')
                                                                <option value="{{ $edit_vehicleMake->status }}"
                                                                    {{ $edit_vehicleMake->status === $edit_vehicleMake->status? 'active' : 'inactive' }}>Active</option>
                                                                <option value="active">Inactive</option>
                                                                @elseif ($edit_vehicleMake->status == 'inactive')
                                                                <option value="{{ $edit_vehicleMake->status }}"
                                                                    {{ $edit_vehicleMake->status === $edit_vehicleMake->status? 'inactive' : 'active' }}>Inactive</option>
                                                                <option value="deleted">Deleted</option>
                                                                @endif
                                                            </select>
                                                                @if($errors->has('status'))
                                                                    <span class="invalid feedback" role="alert">
                                                                        <strong>{{ $errors->first('status') }}.</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                  <?php }?>
                            @else

                        <?php
                        $check_role= Session::get('role');
                        $data = \App\Models\AllDataTableRolesAndPermission::get();
                        foreach($data as $item)
                        {
                         $check_role_name = $item->role_name;
                          foreach ($item->vehicle_make_permissions as $value)
                          {
                               if($value == 'Add') //Users
                               {
                                $checkAdd = $value;

                                if($check_role == $check_role_name && $checkAdd)
                                  {

                              ?>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Vehicle Make</small></h3>
                                </div>
                                <!-- /.card-header -->
                                <!--  form start -->
                                <form id="quickForm" action="{{ url('admin/vehicle/add_make') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Make <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name"
                                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                        id="name" placeholder="Make">
                                                        @if($errors->has('name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status <span
                                                            class="text-danger">*</span></label>
                                                    <select id="status" class="form-control custom-select"
                                                        name="status">
                                                        <option selected disabled>Select one</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                    @if($errors->has('status'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                            <?php } } } } ?>
                            <?php
                            $check_role= Session::get('status');

                                if($check_role == '1')//developer
                                {
                                ?>

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Add Vehicle Make</small></h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!--  form start -->
                                        <form id="quickForm" action="{{ url('admin/vehicle/add_make') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Make <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="name"
                                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                                id="name" placeholder="Make">
                                                                @if($errors->has('name'))
                                                                <span class="invalid feedback" role="alert">
                                                                    <strong>{{ $errors->first('name') }}.</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status">Status <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="status" class="form-control custom-select"
                                                                name="status">
                                                                <option selected disabled>Select one</option>
                                                                <option value="active">Active</option>
                                                                <option value="inactive">Inactive</option>
                                                            </select>
                                                            @if($errors->has('status'))
                                                                <span class="invalid feedback" role="alert">
                                                                    <strong>{{ $errors->first('status') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                  <?php }?>

                        @endif



                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Vehicle Make</h3>
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
                                        <th>Make</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($vehicleMake as $vehicleMake_view)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $vehicleMake_view->name }}</td>
                                            <td>
                                                @if($vehicleMake_view->status == 'active')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center py-0 align-middle">
                                                <div class="btn-group btn-group-sm">


                                                                <?php
                                                                $check_role= Session::get('role');
                                                                $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                                foreach($data as $item)
                                                                {
                                                                $check_role_name = $item->role_name;
                                                                foreach($item->vehicle_make_permissions as $value)
                                                                {
                                                                if($value == 'Edit')//User
                                                                {
                                                                    $checkAdd = $value;

                                                                    if($check_role == $check_role_name && $checkAdd)
                                                                    {

                                                                ?>
                                                                 <a href="{{ url('admin/vehicle/edit_make', $vehicleMake_view->_id) }}"
                                                                    class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                <?php } } } } ?>

                                                                <?php
                                                                $check_role= Session::get('status');

                                                                if($check_role == '1')//developer
                                                                  {
                                                                ?>
                                                               <a href="{{ url('admin/vehicle/edit_make', $vehicleMake_view->_id) }}"
                                                                class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                              <?php }?>



                                                              <?php
                                                              $check_role= Session::get('role');
                                                              $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                              foreach($data as $item)
                                                              {
                                                              $check_role_name = $item->role_name;
                                                              foreach ($item->vehicle_make_permissions as $value)
                                                              {
                                                              if($value == 'Delete')//User
                                                              {
                                                                  $checkAdd = $value;

                                                                  if($check_role == $check_role_name && $checkAdd)
                                                                  {

                                                              ?>
                                                            <a href="{{ url('admin/vehicle/delete_make', $vehicleMake_view->_id) }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                                <?php } } } }?>

                                                                <?php
                                                                $check_role= Session::get('status');

                                                                if($check_role == '1')//developer
                                                                  {
                                                                ?>
                                                                         <a href="{{ url('admin/vehicle/delete_make', $vehicleMake_view->_id) }}"
                                                                            class="btn btn-danger" onclick="return confirm('Are you sure want to this item?')"><i class="fas fa-trash"></i></a>
                                                                <?php }?>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
