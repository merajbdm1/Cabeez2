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
                    @if($message = Session::get('VehicleCategorySuccess'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div> @endif @if($message = Session::get('VehicleCategoryError')) <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div> @endif
                    <!-- jquery validation -->


                    @if(isset($edit_vehicleCategory))

                    <?php
                    $check_role= Session::get('role');
                    $data = \App\Models\AllDataTableRolesAndPermission::get();
                    foreach($data as $item)
                    {
                     $check_role_name = $item->role_name;
                      foreach ($item->vehicle_categories_permissions as $value)
                      {
                           if($value == 'Edit') //Users
                           {
                            $checkAdd = $value;

                            if($check_role == $check_role_name && $checkAdd)
                              {

                          ?>
                           <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Vehicle Category</small></h3>

                            </div>
                            <!-- /.card-header -->
                            <!--  form start -->
                            <form id="quickForm" action="{{ url('admin/vehicle/update_category',$edit_vehicleCategory->_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="customFile">Vehicle Category Image <span class="text-danger">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="icon" accept="image/*"
                                                    onchange="loadFile(event)" value="{{$edit_vehicleCategory->icon}}">

                                                <label class="custom-file-label" for="customFile">Choose
                                                    file</label>
                                                @if ($errors->has('icon'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('icon') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="image-preview r">
                                            <img src="{{ asset('admin/uploads/vehicleImage/'.$edit_vehicleCategory->icon) }}" id="preview_img_id" class="img-fluid" />
                                        </div>



                                        <div class="form-group">
                                            <label for="name">Vehicle Category Name</label>
                                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Category Name" name="name" value="{{$edit_vehicleCategory->name}}">
                                            @if ($errors->has('name'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                            @endif
                                          </div>

                                          <div class="form-group">
                                            <label for="capacity">Seating Capacity</label>
                                            <input type="number" class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}" id="capacity" placeholder="Seating Capacity" name="capacity" value="{{$edit_vehicleCategory->capacity}}">
                                            @if ($errors->has('capacity'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('capacity') }}</strong>
                                                            </span>
                                                        @endif
                                          </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" class="form-control custom-select" name="status">
                                              @if ($edit_vehicleCategory->status == '1')
                                              <option value="{{ $edit_vehicleCategory->status }}"
                                                  {{ $edit_vehicleCategory->status === $edit_vehicleCategory->status? '1' : '0' }}>Active</option>
                                              <option value="0">Inactive</option>
                                              @elseif ($edit_vehicleCategory->status == '0')
                                              <option value="{{ $edit_vehicleCategory->status }}"
                                                  {{ $edit_vehicleCategory->status === $edit_vehicleCategory->status? '0' : '1' }}>Inactive</option>
                                              <option value="1">Active</option>
                                              @endif
                                          </select>
                                            @if ($errors->has('status'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('status') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                          <label for="inputStatus">Parent Category</label>
                                          <select name="category_id" id="" class="form-control">
                                            <option value="">-Select Vehicle Category-</option>
                                            <option value="" selected disabled>{{$edit_vehicleCategory->name }}</option>
                                            @foreach ($vehicleCategory as $vehicle_category)
                                            @if($edit_vehicleCategory->name === $vehicle_category->name )
                                            @continue
                                            {{-- <option value="{{ $edit_vehicleCategory->_id }}" selected>{{ $edit_vehicleCategory->name }}</option> --}}
                                            @else
                                            <option value="{{ $vehicle_category->_id }}" >{{ $vehicle_category->name }}</option> 
                                            @endif
                                                </option>
                                            @endforeach
                                          </select>

                                        

                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                     <?php }   } } }?>

                     <?php
                     $check_role= Session::get('status');

                             if($check_role == '1')//developer
                               {
                           ?>
                             <div class="card card-primary">
                              <div class="card-header">
                                  <h3 class="card-title">Edit Vehicle Category</small></h3>

                              </div>
                              <!-- /.card-header -->
                              <!--  form start -->
                              <form id="quickForm" action="{{ url('admin/vehicle/update_category',$edit_vehicleCategory->_id) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="card-body">
                                      <div class="row">

                                          <div class="form-group">
                                              <label for="customFile">Vehicle Category Image <span class="text-danger">*</span></label>
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="customFile"
                                                      name="icon" accept="image/*"
                                                      onchange="loadFile(event)" value="{{$edit_vehicleCategory->icon}}">

                                                  <label class="custom-file-label" for="customFile">Choose
                                                      file</label>
                                                  @if ($errors->has('icon'))
                                                      <span class="invalid feedback" role="alert">
                                                          <strong>{{ $errors->first('icon') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="image-preview form-group col-lg-8">
                                            <img src="{{ asset('admin/uploads/vehicleImage/'. $edit_vehicleCategory->icon) }}" id="preview_img_id" class="img-fluid" />
                                        </div>


                                          <div class="form-group">
                                              <label for="name">Vehicle Category Name</label>
                                              <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Category Name" name="name" value="{{$edit_vehicleCategory->name}}">
                                              @if ($errors->has('name'))
                                                  <span class="invalid feedback" role="alert">
                                                      <strong>{{ $errors->first('name') }}</strong>
                                                      </span>
                                              @endif
                                            </div>

                                            <div class="form-group">
                                              <label for="capacity">Seating Capacity</label>
                                              <input type="number" class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}" id="capacity" placeholder="Seating Capacity" name="capacity" value="{{$edit_vehicleCategory->capacity}}">
                                              @if ($errors->has('capacity'))
                                                              <span class="invalid feedback" role="alert">
                                                                  <strong>{{ $errors->first('capacity') }}</strong>
                                                              </span>
                                                          @endif
                                            </div>

                                          <div class="form-group">
                                              <label for="status">Status</label>
                                              <select id="status" class="form-control custom-select" name="status">
                                                @if ($edit_vehicleCategory->status == '1')
                                                <option value="{{ $edit_vehicleCategory->status }}"
                                                    {{ $edit_vehicleCategory->status === $edit_vehicleCategory->status? '1' : '0' }}>Active</option>
                                                <option value="0">Inactive</option>
                                                @elseif ($edit_vehicleCategory->status == '0')
                                                <option value="{{ $edit_vehicleCategory->status }}"
                                                    {{ $edit_vehicleCategory->status === $edit_vehicleCategory->status? '0' : '1' }}>Inactive</option>
                                                <option value="1">Active</option>
                                                @endif
                                            </select>
                                              @if ($errors->has('status'))
                                              <span class="invalid feedback" role="alert">
                                                  <strong>{{ $errors->first('status') }}.</strong>
                                              </span>
                                              @endif
                                          </div>
                                          <div class="form-group">
                                            <label for="inputStatus">Parent Category</label>
                                            <select name="category_id" id="" class="form-control">
                                              <option value="">-Select Vehicle Category-</option>
                                              <option value="" selected>{{$edit_vehicleCategory->name }}</option>
                                              @foreach ($vehicleCategory as $vehicle_category)
                                              @if($edit_vehicleCategory->name === $vehicle_category->name )
                                              <option value="{{ $edit_vehicleCategory->_id }}" selected>{{ $edit_vehicleCategory->name }}</option>
                                              @else
                                              <option value="" >{{ $vehicle_category->name }}</option> 
                                              @endif
                                                  </option>
                                              @endforeach
                                            </select>
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
                      foreach ($item->vehicle_categories_permissions as $value)
                      {
                           if($value == 'Add') //Users
                           {
                            $checkAdd = $value;

                            if($check_role == $check_role_name && $checkAdd)
                              {

                          ?>
                          <div class="card card-primary">
                            <div class="card-header">
                              
                                <h3 class="card-title">Add Vehicle Category</small></h3>
                                 
                            </div>
                            <!-- /.card-header -->
                            <!--  form start -->
                            <form id="quickForm" action="{{ url('admin/vehicle/add_category') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">


                                        <div class="form-group">
                                            <label for="customFile">Vehicle Category Image</label>
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="customFile" name="name" accept="image/*" onchange="loadFile(event)">

                                              <label class="custom-file-label" for="customFile">Choose file</label>
                                              @if($errors->has('icon'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('icon') }}</strong>
                                                </span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="image-preview">
                                            <img id="preview_img_id" class="img-fluid"/>
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputCategory1">Vehicle Category Name</label>
                                            <input type="text" class="form-control" id="exampleInputCategory1" placeholder="Enter Category" name="name">
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputCapacity1">Seating Capacity</label>
                                            <input type="number" class="form-control" id="exampleInputCapacity1" placeholder="Enter Capacity" name="capacity">
                                          </div>

                                        

                                          <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select id="inputStatus" class="form-control custom-select" name="status">
                                              <option selected disabled>Select one</option>
                                              <option value="1">Active</option>
                                              <option value="0">Inactive</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputStatus">Parent Category</label>
                                            <select id="inputStatus" class="form-control custom-select" name="parent_id">
                                              <option selected disabled>Select one</option>
                                            @foreach ($vehicleCategory as $vehicleCategoryvalue)
                                            
                                            <option value="{{ $vehicleCategoryvalue->_id }}"> {{ $vehicleCategoryvalue->parent_id == '0' ? $vehicleCategoryvalue->name : '.....'.$vehicleCategoryvalue->name }}</option>

                                              
                                              @endforeach

                                            
                                            </select>

                                          </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                  
                                </div>
                            </form>
                        </div>
                     <?php }   } } }?>

                     <?php
                     $check_role= Session::get('status');

                             if($check_role == '1')//developer
                               {
                           ?>
                          <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Vehicle Category</small></h3>
                                
                            
                            </div>
                            <!-- /.card-header -->
                            <!--  form start -->
                            <form id="quickForm" action="{{ url('admin/vehicle/add_category') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">


                                        <div class="form-group">
                                            <label for="customFile">Vehicle Category Image</label>
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="customFile" name="icon" onchange="loadFile(event)">

                                              <label class="custom-file-label" for="customFile">Choose file</label>
                                              @if($errors->has('icon'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('icon') }}</strong>
                                                </span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="image-preview">
                                            <img id="preview_img_id" class="img-fluid"/>
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputCategory1">Vehicle Category Name</label>
                                            <input type="text" class="form-control" id="exampleInputCategory1" placeholder="Enter Category" name="name">
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputCapacity1">Seating Capacity</label>
                                            <input type="number" class="form-control" id="exampleInputCapacity1" placeholder="Enter Capacity" name="capacity">
                                          </div>


                                          <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select id="inputStatus" class="form-control custom-select" name="status">
                                              <option selected disabled>Select one</option>
                                              <option value="1">Active</option>
                                              <option value="0">Inactive</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputStatus">Parent Category</label>
                                            <select id="inputStatus" class="form-control custom-select" name="parent_id">
                                              <option selected disabled>Select one</option>
                                            @foreach ($vehicleCategory as $vehicleCategoryvalue)
                                            
                                            <option value="{{ $vehicleCategoryvalue->_id }}"> {{ $vehicleCategoryvalue->parent_id == '0' ? $vehicleCategoryvalue->name : '.....'.$vehicleCategoryvalue->name }}</option>

                                              
                                              @endforeach

                                            
                                            </select>

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
                    <div class="card ">
                        <div class="card-header">
                          <h3 class="card-title">All Vehicle Category</h3>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                          <table class="table table-bordered table-striped" id="example1">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Vehicle Image</th>
                                <th>parent_id</th>
                                <th>Vehicle Category</th>
                                <th>Seating Capacity</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($vehicleCategory as $vehicle_category)

                          <tr>
                            <td>{{ $loop->iteration }}</td>

                              <td><img src="{{ asset('admin/uploads/vehicleImage/'. $vehicle_category->icon) }}"
                              width="100px"></td>
                              <td>{{ $vehicle_category->parent_id }}</td>
                              <td>{{ $vehicle_category->name }}</td>

                              <td>{{ $vehicle_category->capacity }}</td>
                              <td>
                              @if($vehicle_category->status == 1)
                                  <span class="badge badge-success">Active</span>

                                   @else
                                   <span class="badge badge-danger">Inactive</span>
                                    @endif
                                  </td>
                              <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  {{-- <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                  </a> --}}

                                  <?php
                                  $check_role= Session::get('role');
                                  $data = \App\Models\AllDataTableRolesAndPermission::get();
                                  foreach($data as $item)
                                  {
                                   $check_role_name = $item->role_name;
                                    foreach ($item->vehicle_categories_permissions as $value)
                                    {
                                         if($value == 'Edit')//User
                                         {
                                          $checkAdd = $value;

                                          if($check_role == $check_role_name && $checkAdd)
                                            {

                                        ?>
                                        <li class="nav-item">
                                          <a class="btn btn-info btn-sm" href="{{ url('admin/vehicle/edit_category',$vehicle_category->_id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                         </a>

                                        </li>
                                   <?php }   } } }?>

                                   <?php
                                   $check_role= Session::get('status');

                                           if($check_role == '1')//Developer
                                             {
                                         ?>
                                        <li class="nav-item">
                                          <a class="btn btn-info btn-sm" href="{{ url('admin/vehicle/edit_category',$vehicle_category->_id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                         </a>

                                        </li>
                                    <?php }  ?>


                                    <?php
                                    $check_role= Session::get('role');
                                    $data = \App\Models\AllDataTableRolesAndPermission::get();
                                    foreach($data as $item)
                                    {
                                     $check_role_name = $item->role_name;
                                      foreach ($item->vehicle_categories_permissions as $value)
                                      {
                                           if($value == 'Delete')//User
                                           {
                                            $checkAdd = $value;

                                            if($check_role == $check_role_name && $checkAdd)
                                              {

                                          ?>

                                      <li class="list-unstyled">
                                        <a href="{{ url('admin/vehicle/delete_category',$vehicle_category->_id) }}" class="btn btn-danger btn-sm">
                                          <i class="fas fa-trash"></i>
                                        </a>
                                      </li>
                                  <?php }   } } }?>

                                  <?php
                                   $check_role= Session::get('status');

                                           if($check_role == '1')//Developer
                                             {
                                         ?>
                                        <li class="list-unstyled">
                                          <a href="{{ url('admin/vehicle/delete_category',$vehicle_category->_id) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                          </a>
                                        </li>
                                    <?php }  ?>

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

