


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
                            <li class="breadcrumb-item active">Vehicle Model</li>
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
                        @if ($message = Session::get('VehicleModalSuccess'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif @if ($message = Session::get('VehicleModalError'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <!-- jquery validation -->


                            @if (isset($edit_vehicleModel))

                  <?php
                    $check_role= Session::get('role');
                    $data = \App\Models\AllDataTableRolesAndPermission::get();
                    foreach($data as $item)
                    {
                     $check_role_name = $item->role_name;
                      foreach ($item->vehicle_model_permissions as $value)
                      {
                           if($value == 'Edit') //Users
                           {
                            $checkAdd = $value;

                            if($check_role == $check_role_name && $checkAdd)
                              {

                          ?>

                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Vehicle Model</small></h3>

                                    </div>
                                    <!-- /.card-header -->
                                    <!--  form start -->
                                    <form id="quickForm"
                                        action="{{ url('admin/vehicle/update_model', $edit_vehicleModel->_id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="exampleInputVehicleModel1">Vehicle Model</label>
                                                <input type="text" class="form-control" id="exampleInputVehicleModel1"
                                                    placeholder="Vehicle Model" name="make_model_name"
                                                    value={{ $edit_vehicleModel->make_model_name }}>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputMake">Vehicle Make</label>
                                                <select id="inputMake" class="form-control custom-select"
                                                    name="vehicle_make_id">
                                                    <option selected disabled>{{ $edit_vehicleModel->make->name }}
                                                    </option>

                                                    @foreach ($vehicleMake as $vehicle_make_model)
                                                        @if ($edit_vehicleModel->make->name == $vehicle_make_model->name)
                                                            @continue
                                                        @else
                                                            <option value="{{ $vehicle_make_model->_id }}">
                                                                {{ $vehicle_make_model->name }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCategory">Category</label>
                                                <select id="inputCategory" class="form-control custom-select"
                                                    name="vehicle_category_id">
                                                    <option selected disabled>
                                                        {{ $edit_vehicleModel->categories->name }}</option>
                                                    @foreach ($vehicleCategory as $vehicle_category_model)
                                                        @if ($edit_vehicleModel->categories->name == $vehicle_category_model->name)
                                                            @continue
                                                        @else
                                                            <option value="{{ $vehicle_category_model->_id }}">
                                                                {{ $vehicle_category_model->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="active">Status</label>
                                                <select id="active" class="form-control custom-select"
                                                    name="active">
                                                    @if ($edit_vehicleModel->active == '1')
                                                        <option value="{{ $edit_vehicleModel->active }}"
                                                            {{ $edit_vehicleModel->active === $edit_vehicleModel->active ? '1' : '0' }}>
                                                            Active</option>
                                                        <option value="0">Inactive</option>
                                                    @elseif ($edit_vehicleModel->active == '0')
                                                        <option value="{{ $edit_vehicleModel->active }}"
                                                            {{ $edit_vehicleModel->active === $edit_vehicleModel->active ? '0' : '1' }}>
                                                            Inactive</option>
                                                        <option value="1">Active</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('active'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('active') }}.</strong>
                                                    </span>
                                                @endif
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
                                        <h3 class="card-title">Edit Vehicle Model</small></h3>

                                    </div>
                                    <!-- /.card-header -->
                                    <!--  form start -->
                                    <form id="quickForm"
                                        action="{{ url('admin/vehicle/update_model', $edit_vehicleModel->_id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="exampleInputVehicleModel1">Vehicle Model</label>
                                                <input type="text" class="form-control" id="exampleInputVehicleModel1"
                                                    placeholder="Vehicle Model" name="make_model_name"
                                                    value={{ $edit_vehicleModel->make_model_name }}>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputMake">Vehicle Make</label>
                                                <select id="inputMake" class="form-control custom-select"
                                                    name="vehicle_make_id">
                                                    <option selected disabled>{{ $edit_vehicleModel->make->name }}
                                                    </option>

                                                    @foreach ($vehicleMake as $vehicle_make_model)
                                                        @if ($edit_vehicleModel->make->name == $vehicle_make_model->name)
                                                            @continue
                                                        @else
                                                            <option value="{{ $vehicle_make_model->_id }}">
                                                                {{ $vehicle_make_model->name }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCategory">Category</label>
                                                <select id="inputCategory" class="form-control custom-select"
                                                    name="vehicle_category_id">
                                                    <option selected disabled>
                                                        {{ $edit_vehicleModel->categories->name }}
                                                    </option>
                                                    @foreach ($vehicleCategory as $vehicle_category_model)
                                                        @if ($edit_vehicleModel->categories->name == $vehicle_category_model->name)
                                                            @continue
                                                        @else
                                                            <option value="{{ $vehicle_category_model->_id }}">
                                                                {{ $vehicle_category_model->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="active">Status</label>
                                                <select id="active" class="form-control custom-select"
                                                    name="active">
                                                    @if ($edit_vehicleModel->active == '1')
                                                        <option value="{{ $edit_vehicleModel->active }}"
                                                            {{ $edit_vehicleModel->active === $edit_vehicleModel->active ? '1' : '0' }}>
                                                            Active</option>
                                                        <option value="0">Inactive</option>
                                                    @elseif ($edit_vehicleModel->active == '0')
                                                        <option value="{{ $edit_vehicleModel->active }}"
                                                            {{ $edit_vehicleModel->active === $edit_vehicleModel->active ? '0' : '1' }}>
                                                            Inactive</option>
                                                        <option value="1">Active</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('active'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('active') }}.</strong>
                                                    </span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="inputStatus">Type</label>
                                                <select id="inputStatus" class="form-control custom-select"
                                                    name="type">

                                                    @if ($edit_vehicleModel->type == 'cng')
                                                    <option value="{{ $edit_vehicleModel->type }}"
                                                        {{ $edit_vehicleModel->type === $edit_vehicleModel->type ? 'cng' : 'ev' }}>
                                                        cng</option>
                                                    <option value="ev">EV</option>
                                                @elseif ($edit_vehicleModel->type == 'ev')
                                                    <option value="{{ $edit_vehicleModel->type }}"
                                                        {{ $edit_vehicleModel->type === $edit_vehicleModel->type ? 'ev' : 'cng' }}>
                                                        ev</option>
                                                    <option value="cng">cng</option>
                                                @endif

                                                </select>
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
                              foreach ($item->vehicle_model_permissions as $value)
                              {
                                   if($value == 'Add') //Users
                                   {
                                    $checkAdd = $value;

                                    if($check_role == $check_role_name && $checkAdd)
                                      {

                                  ?>


                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Vehicle Model</small></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!--  form start -->
                                    <form id="quickForm" action="{{ url('admin/vehicle/add_model') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputVehicleModel1">Vehicle Model</label>
                                                <input type="text" class="form-control" id="exampleInputVehicleModel1"
                                                    placeholder="Enter Vehicle Model" name="make_model_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputMake">Vehicle Make</label>
                                                <select id="inputMake" class="form-control custom-select"
                                                    name="vehicle_make_id">
                                                    <option selected disabled>Select one</option>
                                                    @foreach ($vehicleMake as $vehicle_make_model)
                                                        <option value="{{ $vehicle_make_model->_id }}">
                                                            {{ $vehicle_make_model->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCategory">Category</label>
                                                <select id="inputCategory" class="form-control custom-select"
                                                    name="vehicle_category_id">
                                                    <option selected disabled>Select one</option>
                                                    @foreach ($vehicleCategory as $vehicle_category_model)
                                                        <option value="{{ $vehicle_category_model->_id }}">
                                                            {{ $vehicle_category_model->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStatus">Status</label>
                                                <select id="inputStatus" class="form-control custom-select"
                                                    name="active">
                                                    <option selected disabled>Select one</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- /.card-header -->

                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
                                        <h3 class="card-title">Add Vehicle Model</small></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!--  form start -->
                                    <form id="quickForm" action="{{ url('admin/vehicle/add_model') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputVehicleModel1">Vehicle Model</label>
                                                <input type="text" class="form-control" id="exampleInputVehicleModel1"
                                                    placeholder="Enter Vehicle Model" name="make_model_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputMake">Vehicle Make</label>
                                                <select id="inputMake" class="form-control custom-select"
                                                    name="vehicle_make_id">
                                                    <option selected disabled>Select one</option>
                                                    @foreach ($vehicleMake as $vehicle_make_model)
                                                        <option value="{{ $vehicle_make_model->_id }}">
                                                            {{ $vehicle_make_model->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCategory">Category</label>
                                                <select id="inputCategory" class="form-control custom-select"
                                                    name="vehicle_category_id">
                                                    <option selected disabled>Select one</option>
                                                    @foreach ($vehicleCategory as $vehicle_category_model)
                                                        <option value="{{ $vehicle_category_model->_id }}">
                                                            {{ $vehicle_category_model->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStatus">Status</label>
                                                <select id="inputStatus" class="form-control custom-select"
                                                    name="active">
                                                    <option selected disabled>Select one</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStatus">Type</label>
                                                <select id="inputStatus" class="form-control custom-select"
                                                    name="type">
                                                    <option selected disabled>Select one</option>
                                                    <option value="CNG">CNG</option>
                                                    <option value="EV">EV</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- /.card-header -->

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
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">All Vehicle Model</h3>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Model</th>
                                            <th>Make</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($vehicleModel as $vehicle_model)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $vehicle_model->name}}</td>

                                                {{-- <td>{{ $vehicle_model->make->name}}</td> --}}

                                                <td>{{$vehicle_model->make->name}}</td>
                                                <td>{{ $vehicle_model->categories->name}}</td>
                                                <td>
                                                    @if ($vehicle_model->active == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $vehicle_model->type}}</td>
                                                <td class="text-center py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">

                                                      <?php
                                                      $check_role= Session::get('role');
                                                      $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                      foreach($data as $item)
                                                      {
                                                      $check_role_name = $item->role_name;
                                                      foreach ($item->vehicle_model_permissions as $value)
                                                      {
                                                      if($value == 'Edit')//User
                                                      {
                                                          $checkAdd = $value;

                                                          if($check_role == $check_role_name && $checkAdd)
                                                          {

                                                      ?>
                                                       <a class="btn btn-info btn-sm"
                                                           href="{{ url('admin/vehicle/edit_model', $vehicle_model->_id) }}">
                                                           <i class="fas fa-pencil-alt">
                                                           </i>

                                                       </a>
                                                        <?php } } } } ?>


                                                        <?php
                                                        $check_role= Session::get('status');

                                                        if($check_role == '1')//developer
                                                          {
                                                        ?>
                                                          <a class="btn btn-info btn-sm"
                                                          href="{{ url('admin/vehicle/edit_model', $vehicle_model->_id) }}">
                                                          <i class="fas fa-pencil-alt">
                                                          </i>

                                                          </a>
                                                        <?php }?>


                                                        <?php
                                                        $check_role= Session::get('role');
                                                        $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                        foreach($data as $item)
                                                        {
                                                        $check_role_name = $item->role_name;
                                                        foreach ($item->vehicle_model_permissions as $value)
                                                        {
                                                        if($value == 'Delete')//User
                                                        {
                                                            $checkAdd = $value;

                                                            if($check_role == $check_role_name && $checkAdd)
                                                            {

                                                        ?>

                                                        <a href="{{ url('admin/vehicle/delete_model', $vehicle_model->_id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to Delete Model?');">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                        <?php } } } }?>
                                                        <?php
                                                        $check_role= Session::get('status');

                                                        if($check_role == '1')//developer
                                                          {
                                                        ?>
                                                         <a href="{{ url('admin/vehicle/delete_model', $vehicle_model->_id) }}"
                                                          class="btn btn-danger btn-sm"
                                                          onclick="return confirm('Are you sure you want to Delete Model?');">
                                                          <i class="fas fa-trash"></i>
                                                      </a>


                                                          <?php }?>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
