@extends('admin.layout.master') @section('style') @endsection @section('content') <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Vehicle Setting </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Setting</a>
              </li>
              <li class="breadcrumb-item active">Vehicle Setting</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Model</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Make</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            @if($message = Session::get('VehicleCategorySuccess'))
                                 <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                              </div> @endif @if($message = Session::get('VehicleMakeError')) <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                              </div> @endif

                              @if($message = Session::get('VehicleMakeSuccess'))
                                 <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                              </div> @endif @if($message = Session::get('VehicleMakeError')) <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                              </div> @endif

                              @if($message = Session::get('VehicleModalSuccess'))
                                 <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                              </div> @endif @if($message = Session::get('VehicleModalError')) <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                              </div> @endif
                            <!-- general form elements -->
                            
                              
                              
                              
                              
                              
                              <!-- /.card-header -->
                              <!-- form start -->
                              <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                  
                                  <div class="modal-content">
                                    <div class="card card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title">Add Vehicle Category</h3>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="admin_vehicle_category_process" method="POST" enctype="multipart/form-data">  @csrf <div class="card-body">
                                      <div class="form-group">
                                        <label for="customFile">Vehicle Category Image</label>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile" name="vehicle_category_image" accept="image/*" onchange="loadFile(event)">
                                          
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                          @if($errors->has('vehicle_category_image'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('vehicle_category_image') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="image-preview">
                                        <img id="preview_img_id" class="img-fluid"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputCategory1">Vehicle Category Name</label>
                                        <input type="text" class="form-control" id="exampleInputCategory1" placeholder="Enter Category" name="vehicle_category_name">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputCapacity1">Seating Capacity</label>
                                        <input type="number" class="form-control" id="exampleInputCapacity1" placeholder="Enter Capacity" name="vehicle_seating_capacity">
                                      </div>
                                      <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select id="inputStatus" class="form-control custom-select" name="vehicle_category_status">
                                          <option selected disabled>Select one</option>
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
                                        </select>
                                      </div>
                                      
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                      <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                  </form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              
                            </div>
                            <div class="card ">
                              <div class="card-header">
                                <h3 class="card-title">Vehicle Category</h3>
                                <button type="button" class="btn btn-default float-right bg-primary" data-toggle="modal" data-target="#modal-lg">
                                  Add Vehicle Category
                                </button>
                              </div>
                              
                              <!-- /.card-header -->
                              <div class="card-body">
                                <table class="table table-bordered table-striped Mydatatable">
                                  <thead>
                                    <tr>
                                      <th>Vehicle Image</th>
                                      <th>Vehicle Category</th>
                                      <th>Seating Capacity</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($vehicleCategory as $vehicle_category)

                                <tr>
                                    <td><img src="{{ asset('admin/uploads/vehicleImage/'. $vehicle_category->vehicle_category_image) }}"
                                    width="100px"></td>
                                    <td>{{ $vehicle_category->vehicle_category_name }}</td>

                                    <td>{{ $vehicle_category->vehicle_seating_capacity }}</td>
                                    <td>
                                    @if($vehicle_category->vehicle_category_status == 1) 
                                        <span class="badge badge-success">Active</span>
                                        
                                         @else
                                         <span class="badge badge-danger">Inactive</span>
                                          @endif
                                        </td>
                                    <td class="text-center py-0 align-middle">
                                      <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-primary btn-sm">
                                          <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ url('admin_edit_vehicle_category',$vehicle_category->_id) }}">
                                          <i class="fas fa-pencil-alt">
                                          </i>
                                          
                                      </a>
                                        <a href="#" class="btn btn-danger btn-sm">
                                          <i class="fas fa-trash"></i>
                                        </a>
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
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            
                            <!-- general form elements -->
                            <div class="modal fade" id="modal-lg2">
                              <div class="modal-dialog modal-lg">
                                
                                <div class="modal-content">
                            <div class="card card-primary">

                              <div class="card-header">
                                <h3 class="card-title">Vehicle Model</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="vehicle_model_process" method="post"> @csrf <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputVehicleModel1">Vehicle Model</label>
                                    <input type="text" class="form-control" id="exampleInputVehicleModel1" placeholder="Enter Vehicle Model" name="vehicle_model">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputMake">Vehicle Make</label>
                                    <select id="inputMake" class="form-control custom-select" name="vehicle_make_id">
                                      <option selected disabled>Select one</option>
                                      @foreach ($vehicleMake as $vehicle_make_model)
                                      <option value="{{ $vehicle_make_model->_id}}">{{$vehicle_make_model->vehicle_make}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputCategory">Category</label>
                                    <select id="inputCategory" class="form-control custom-select" name="vehicle_category_id">
                                      <option selected disabled>Select one</option>
                                      @foreach ($vehicleCategory as $vehicle_category_model)
                                      <option value="{{ $vehicle_category_model->_id}}">{{$vehicle_category_model->vehicle_category_name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" class="form-control custom-select" name="vehicle_model_status">
                                      <option selected disabled>Select one</option>
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                    </select>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                              </form>
                            </div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">Vehicle Model</h3>
                                <button type="button" class="btn btn-default float-right bg-primary" data-toggle="modal" data-target="#modal-lg2">
                                  Add Vehicle Model
                                </button>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                  <thead>
                                    <tr>
                                      <th>Model</th>
                                      <th>Make</th>
                                      <th>Category</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($vehicleModel as $vehicle_model)
                                    <tr>
                                      <td>{{$vehicle_model->vehicle_model}}</td>
                                      <td>{{$vehicle_model->make->vehicle_make}}</td>
                                      <td>{{$vehicle_model->categories->vehicle_category_name}}</td>
                                      <td>
                                        @if($vehicle_model->vehicle_model_status == 1) 
                                        <span class="badge badge-success">Active</span>
                                        
                                         @else
                                         <span class="badge badge-danger">Inactive</span>
                                          @endif 
                                      </td>
                                      <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                          </a>
                                          <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            
                                        </a>
                                          <a href="#" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                          </a>
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
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            
                            <!-- general form elements -->
                            <div class="modal fade" id="modal-lg3">
                              <div class="modal-dialog modal-lg">
                                
                                <div class="modal-content">
                            <div class="card card-primary"> 
                               
                              <div class="card-header">
                                <h3 class="card-title">Vehicle Make</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="admin_vehicle_make_process" method="POST"> @csrf <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputCategory1">Vehicle Make</label>
                                    <input type="text" class="form-control" id="exampleInputCategory1" placeholder="Enter Category" name="vehicle_make">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" class="form-control custom-select" name="vehicle_make_status">
                                      <option selected disabled>Select one</option>
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                    </select>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                              </form>
                            </div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">Vehicle Make</h3>
                                <button type="button" class="btn btn-default float-right bg-primary" data-toggle="modal" data-target="#modal-lg3">
                                  Add Vehicle Make
                                </button>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <table class="table table-bordered table-striped Mydatatable">
                                  <thead>
                                    <tr>
                                      <th>Make</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody> @foreach($vehicleMake as $vehicle_make) <tr>
                                      <td>{{$vehicle_make->vehicle_make}}</td>
                                      <td> 
                                        @if($vehicle_make->vehicle_make_status == 1) 
                                        <span class="badge badge-success">Active</span>
                                        
                                         @else
                                         <span class="badge badge-danger">Inactive</span>
                                          @endif 
                                        </td>
                                      <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                          <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                          </a>
                                          <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            
                                        </a>
                                          <a href="#" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                          </a>
                                        </div>
                                      </td>
                                    </tr> @endforeach </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div> @endsection @section('script') @endsection