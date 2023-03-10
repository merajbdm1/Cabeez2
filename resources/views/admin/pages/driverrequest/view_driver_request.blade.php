@extends('admin.layout.master')
@section('style')
@endsection

<style>
     /* nav svg {
        max-height: 10px;
    } */
    .laravell_paginate nav {
    float: right;
}
</style>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>Driver Request</h1>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Driver Request</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card mx-3">
            <div class="card-header">

                <form id="form_id" action="{{ route('driver_request') }}" method="GET">
                    <div class="row">
                        <div class="col-3">
                            <p for="">FIRST NAME</p>
                            <input type="text" name="fname" value="{{ request('fname') }}" id="fname"
                                placeholder="Enter First Name" class="form-control">


                        </div>

                        <div class="col-3">
                            <p for="">LAST NAME</p>
                            <input type="text" name="lname" id="lname" value="{{ request('lname') }}"
                                placeholder="Enter Last Name" class="form-control">


                        </div>
                        <div class="col-3">
                            <p for="">Email</p>
                            <input type="text" class="form-control" value="{{ request('email') }}" placeholder="Email"
                                name="email">
                        </div>

                        <div class="col-3">
                            <p for="">Mobile Number</p>
                            <input type="text" class="form-control" value="{{ request('phone_number') }}" placeholder="Mobile Number"
                                name="phone_number">
                        </div>

                        {{-- <div class="col-3">
                            <p for="">Vehicle Category</p>
                            <select name="category_id" id="" class="form-control">
                                <option value="">-Select category-</option>

                            </select>
                        </div>


                        <div class="col-3">
                            <p for="">Avability</p>
                            <select name="is_available" id="" class="form-control">
                                <option value="">-Select Avalibilty-</option>
                                <option value="1">Available</option>
                                <option value="0">UnAvailable</option>

                            </select>
                        </div> --}}


                        <div class="col-3">
                            <p for="">Booking Range From</p>
                            <input type="date" class="form-control" name="fromDate"
                                placeholder="Date">

                        </div>
                        <div class="col-3">
                            <p for="">Booking Range To</p>
                            <input type="date" class="form-control" name="ToDate"
                                placeholder="Date">
                        </div>

                    </div>


                    <br>
                    <button id="registerSubmit" class="btn btn-dark" type="submit">SEARCH</button>

                    <a href="{{url('driver_request')}}" type="button" value="submit" class="btn btn-dark" > CLEAR</a>
                    {{-- <input type="button" class="btn btn-dark" id="clearbtn"  value="CLEAR"
                        onclick="myFunction()"> --}}

                </form>

            </div>

        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        @if ($message = Session::get('DriverDetailSuccess'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif @if ($message = Session::get('DriverDetailError'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <!-- jquery validation -->

                            <div class="card">
                                <div class="card-header">

                                    <h3 class="card-title">All Drivers Request</h3>

                                    <?php
                                    $check_role= Session::get('role');
                                    $data = \App\Models\AllDataTableRolesAndPermission::get();
                                    foreach($data as $item)
                                    {
                                     $check_role_name = $item->role_name;
                                      foreach ($item->driver_permissions as $value)
                                      {
                                           if($value == 'Add') //Users
                                           {
                                            $checkAdd = $value;

                                            if($check_role == $check_role_name && $checkAdd)
                                              {

                                          ?>
                                          <li class="list-unstyled">
                                            <a type="button" href="{{ url('admin/add_driver') }}" class="btn btn-default float-right bg-primary">
                                                Add Driver
                                            </a>
                                          </li>
                                     <?php }   } } }?>

                                     <?php
                                     $check_role= Session::get('status');

                                             if($check_role == '1'|| $check_role == '2')//Developer or super admin
                                               {
                                           ?>
                                           <li class="list-unstyled">
                                            <a type="button" href="{{ url('admin/add_driver') }}" class="btn btn-default float-right bg-primary">
                                                Add Driver
                                            </a>
                                          </li>
                                      <?php }?>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true">NO</th>
                                                <th data-sortable="true">FIRST NAME</th>
                                                <th data-sortable="true">LAST NAME</th>
                                                <th data-sortable="true">MOBILE NO</th>
                                                <th data-sortable="true">EMAIL</th>
                                                <th data-sortable="true">CREATED DATE</th>
                                                <th data-sortable="true">STATUS</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($driver as $key=>$driver_model)

                                                <tr>
                                                    <td>{{ ($driver->currentpage()-1) * $driver->perpage() + $key + 1 }}</td>
                                                    <td>{{ $driver_model->first_name }}</td>
                                                    <td>{{ $driver_model->last_name }}
                                                    </td>
                                                    <td>{{ $driver_model->phone_number }}</td>
                                                    <td>{{ $driver_model->email }}</td>
                                                    <td>{{ $driver_model->created_at }}</td>
                                                    {{--
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_profile_picture) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_upload_commercial_insurance) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_license_front) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_license_back) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_aadhaar_front) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_aadhaar_back) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_rental_agreement_front) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_rental_agreement_back) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_pan_card) }}"
                                                            width="100px"></td>
                                                    <td><img src="{{ asset('admin/uploads/Driver/' . $driver_model->driver_vehicle_registration_image) }}"
                                                            width="100px"></td>
                                                    <td> --}}
                                                        <td>
                                                        @if ($driver_model->document_status == 'inactive')
                                                            <span class="badge badge-success">Verified</span>
                                                        @else
                                                            <span class="badge badge-danger">UnVerified</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-left py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">

                                                            <?php
                                                            $check_role= Session::get('role');
                                                            $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                            foreach($data as $item)
                                                            {
                                                             $check_role_name = $item->role_name;
                                                              foreach ($item->driver_permissions as $value)
                                                              {
                                                                   if($value == 'View')//User
                                                                   {
                                                                    $checkAdd = $value;

                                                                    if($check_role == $check_role_name && $checkAdd)
                                                                      {

                                                                  ?>
                                                                  <li class = "list-unstyled">
                                                                    <a href="{{ url('admin/view_driver', $driver_model->_id) }}" class="btn btn-info"><i
                                                                        class="fas fa-eye"></i></a>
                                                                  </li>
                                                             <?php }   } } }?>

                                                             <?php
                                                             $check_role= Session::get('status');

                                                                     if($check_role == '1' || $check_role == '2')//Developer or super admin

                                                                       {
                                                                   ?>
                                                                   <li class = "list-unstyled">
                                                                    <a href="{{ url('admin/view_driver', $driver_model->_id) }}" class="btn btn-info"><i
                                                                        class="fas fa-eye"></i></a>
                                                                  </li>
                                                              <?php }  ?>



                                                             <?php
                                                            $check_role= Session::get('role');
                                                            $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                            foreach($data as $item)
                                                            {
                                                             $check_role_name = $item->role_name;
                                                              foreach ($item->driver_permissions as $value)
                                                              {
                                                                   if($value == 'Edit')//User
                                                                   {
                                                                    $checkAdd = $value;

                                                                    if($check_role == $check_role_name && $checkAdd)
                                                                      {

                                                                  ?>
                                                                  <li class = "list-unstyled">
                                                                    <a href="{{ url('admin/edit_driver', $driver_model->_id) }}"
                                                                        class="btn btn-primary"><i
                                                                            class="fas fa-pencil-alt"></i></a>
                                                                  </li>
                                                             <?php }   } } }?>

                                                             <?php
                                                             $check_role= Session::get('status');

                                                                     if($check_role == '1'|| $check_role == '2')//Developer or super admin
                                                                       {
                                                                   ?>
                                                                   <li class = "list-unstyled">
                                                                    <a href="{{ url('admin/edit_driver', $driver_model->_id) }}"
                                                                        class="btn btn-primary"><i
                                                                            class="fas fa-pencil-alt"></i></a>
                                                                  </li>
                                                              <?php }  ?>





                                                             <?php
                                                             $check_role= Session::get('role');
                                                             $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                             foreach($data as $item)
                                                             {
                                                              $check_role_name = $item->role_name;
                                                               foreach ($item->driver_permissions as $value)
                                                               {
                                                                    if($value == 'Delete')//User
                                                                    {
                                                                     $checkAdd = $value;

                                                                     if($check_role == $check_role_name && $checkAdd)
                                                                       {

                                                                   ?>
                                                                   <li class = "list-unstyled">
                                                                    <a href="{{ url('admin/delete_driver', $driver_model->_id) }}" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this Fare?');" ><i
                                                                        class="fas fa-trash"></i></a>
                                                                   </li>
                                                              <?php }   } } }?>

                                                              <?php
                                                              $check_role= Session::get('status');

                                                                      if($check_role == '1'|| $check_role == '2')//Developer or super admin
                                                                        {
                                                                    ?>
                                                                   <li class = "list-unstyled">
                                                                    <a href="{{ url('admin/delete_driver', $driver_model->_id) }}" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this Fare?');" ><i
                                                                        class="fas fa-trash"></i></a>
                                                                   </li>
                                                               <?php }  ?>




                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {{-- <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script> --}}
                                    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

                                    <br>
                                    {{-- showign 1 to 6 total 7057  --}}
                                   <div class="laravell_paginate">
                                    <div class="row">

                                        <div class="col-7">
                                            Showing {{ $driver->firstItem() }} - {{ $driver->lastItem()}} Total {{ $driver->total() }}
                                        </div>
                                        <div class="col-5">
                                           {!! $driver->appends(['sort' => 'votes'])->links() !!}
                                        </div>

                                    </div>
                                   </div>



                                    {{-- {{ $driver->links() }} --}}
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
    <script>
        var loadFile3 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_img_id3');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile4 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_img_id4');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile5 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_img_id5');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile6 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_img_id6');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile7 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_img_id7');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile8 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_img_id8');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile9 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_img_id9');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>

    <script>
        var loadFile10 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_img_id10');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
