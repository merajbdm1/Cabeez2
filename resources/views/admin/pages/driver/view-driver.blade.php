@extends('admin.layout.master')

@section('style')


    <style>
        /* Custom CSS for toggle button */

    .btn-toggle {
      background-color: grey;
      color: #212529;
      border: none;
      outline: none;
      box-shadow: none;
      padding: 0.5rem 1rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.25rem;
    }
    .btn-toggle :hover{
        color:white;
    }
    /* .btn-toggle.active,
    .btn-toggle:active {
      background-color: green;
      color: #fff;
    } */

    .btn-toggle:focus {
      outline: none;
      box-shadow: none;
    }
    </style>
    <style>


        /* nav svg {
            max-height: 10px;
        } */
        .laravell_paginate nav {
            float: right;
        }
        /* .laravell_p .page-item.active .page-link {
            z-index: 4;
            color: #007bff;

            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .laravell_p .page-link:focus {
            z-index: 3;
            outline: 0;
            color: #fff;
            background-color: #007bff;
        }

        input[type="checkbox"] {
            position: relative;
            width: 40px;
            height: 20px;
            -webkit-appearance: none;
            appearance: none;
            background: rgb(173, 0, 0);
            outline: none;
            border-radius: 2rem;
            cursor: pointer;
            box-shadow: inset 0 0 5px rgb(0 0 0 / 50%);
        }

        input[type="checkbox"]::before {
            content: "";
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #f5f5f5;
            position: absolute;
            top: 0;
            left: 0;
            transition: 0.5s;
        }

        input[type="checkbox"]:checked::before {
            transform: translateX(100%);
            background: #fff;
        }

        input[type="checkbox"]:checked {
            background: #05ee66;
        } */
    </style>@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>Driver</h1>

                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Driver</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card mx-3">
            <div class="card-header">

                <form id="form_id" action="{{ route('search') }}" method="GET">
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
                            <input type="email" class="form-control" value="{{ request('email') }}" placeholder="Email"
                                name="email">
                        </div>

                        <div class="col-3">
                            <p for="">Mobile Number</p>
                            <input type="number" class="form-control" value="{{ request('phone_number') }}" placeholder="Mobile Number"
                                name="phone_number">
                        </div>

                        <div class="col-3">
                            <p for="">Vehicle Category</p>
                            <select name="category_id" id=""  class="form-control">
                                <option value="">-Select category-</option>
                                @foreach($vehicle_driv as $key=>$fob)
                                <option value="{{$fob->id}}" {{ request('category_id') == $fob->id ? "selected" :""}}>{{$fob->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <p for="">Avability</p>
                            <select name="is_available" id="" class="form-control">
                                <option value="">-Select Avalibilty-</option>
                                <option value="1" {{ request('is_available') == "1" ? "selected" :""}}>Available</option>
                                <option value="0" {{ request('is_available') == "0" ? "selected" :""}}>UnAvailable</option>

                            </select>
                        </div>


                        <div class="col-3">
                            <p for="">Booking Range From</p>
                            <input type="date" class="form-control" value="{{ request('fromDate') }}" name="fromDate"
                                placeholder="Date">

                        </div>
                        <div class="col-3">
                            <p for="">Booking Range To</p>
                            <input type="date" class="form-control" value="{{ request('ToDate') }}" name="ToDate"
                                placeholder="Date">
                        </div>

                    </div>


                    <br>
                    <button id="registerSubmit" class="btn btn-dark" type="submit">SEARCH</button>

                    <a href="{{url('/admin/driver')}}" type="button" value="submit" class="btn btn-dark" > CLEAR</a>
                    {{-- <input type="button" class="btn btn-dark" id="clearbtn"  value="CLEAR"
                        onclick="myFunction()"> --}}

                </form>

            </div>

        </div>
        <!-- Main content -->
        <div class="card mx-3">
            <div class="card-header">

                <h3 class="card-title">All Drivers</h3>

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
                            <th class="text-center" data-sortable="true">NO</th>
                            <th class="text-center" data-sortable="true">FIRST NAME</th>
                            <th class="text-center" data-sortable="true">LAST NAME</th>
                            <th class="text-center" data-sortable="true">MOBILE NO</th>
                            <th class="text-center" data-sortable="true">EMAIL</th>
                            <th class="text-center" data-sortable="true">CATEGORY</th>
                            <th class="text-center" data-sortable="true">AVALIBILITY</th>

                            <th class="text-center" data-sortable="true">LOCATION STATUS</th>
                            <th class="text-center" data-sortable="true">STATUS</th>
                            <th class="text-center" data-sortable="true">CREATED DATE</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            {{-- @php
                            $loop=1;
                          @endphp --}}

                        @foreach ($driver as $key=>$driver_model)

                            <tr>
                                <td class="text-center">{{ ($driver->currentpage()-1) * $driver->perpage() + $key + 1 }}</td>
                                <td class="text-center">{{ $driver_model->first_name }}</td>
                                <td class="text-center">{{ $driver_model->last_name }}
                                </td>
                                <td class="text-center">{{ $driver_model->phone_number }}</td>
                                <td class="text-center">{{ $driver_model->email }}</td>

                                <td class="text-center">{{ $driver_model->driver_vehicle_category->name }}</td>
                                <td class="text-center">
                                    @if ($driver_model->is_available == '1')
                                        <span style="color:green">Available</span>
                                    @else
                                        <span style="color:red">Not Available</span>
                                    @endif
                                </td>

                                    <td>
                                    @if ($driver_model->is_available == '1')
                                        <span style="color:green">ON</span>
                                    @else
                                        <span style="color:red">OFF</span>
                                    @endif
                                </td>

                                    {{-- <form id="Status_active_inactive">
                                        <input type="hidden" value="{{ $driver_model->category_id }}">
                                        <button  class="btn-btn-primary hold" title="Hold" id="kvalue_post" ><i class="icon-control-pause"><?php echo 'Active';?></i></button>
                                    </form> --}}

                                    <td>
                                        {{-- @if ($driver_model->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">InActive</span>
                                        @endif --}}

                                          <a href="" class=" hold toggle-class"
                                                info="{{ $driver_model->_id }}"
                                                 title="Change shift" id="kvalue_post"
                                                 value="{{ $driver_model->status }}"
                                                 onclick="return confirm('Are you sure change shift status ?')">
                                                 <?php if($driver_model->status == 'active' )
                                                 {
                                                     echo '<button class="btn btn-outline-primary " >Active</button>';
                                                 }else{
                                                     echo '<button class="btn btn-outline-danger ">InActive</button>';
                                                 }
                                                     {
                                                 ?>
                                                 <?php  }?>

                                         </a>

                                    </td>

                                    {{-- <input data-id="{{$driver_model->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $driver_model->is_shift_started == 1 ? 'checked' : '' }}> --}}


                                    @php



                                                                          // if($driver_model->is_shift_started == 1 ){

                                        // }

                                    @endphp
                                        {{-- <td> --}}

                                            {{-- <form id="status_active" method="post"> --}}
                                                {{-- <input name="object_id" type="hidden" value="{{ $driver_model->_id }}"> --}}
                                                {{-- <input class="btn btn-primary hold toggle-class"
                                                info="{{ $driver_model->_id }}"
                                                 title="Hold" id="kvalue_post"
                                                 value="{{ $driver_model->is_shift_started == 1 ? 'Active':'Inactive'}}"> --}}


                                                {{-- <a href="" class=" hold toggle-class"
                                                info="{{ $driver_model->_id }}"
                                                 title="Change shift" id="kvalue_post"
                                                 value="{{ $driver_model->is_shift_started }}"
                                                 onclick="return confirm('Are you sure change shift status ?')">
                                                    <?php if($driver_model->is_shift_started == 1 )
                                                        {
                                                            echo '<button class="btn btn-outline-primary " >Active</button>';
                                                        }else{
                                                            echo '<button class="btn btn-outline-danger ">InActive</button>';
                                                        }
                                                            {
                                                        ?>
                                                        <?php  }?>

                                                </a> --}}


                                            {{-- </form> --}}
                                      {{-- </td> --}}


                            <td class="text-center">{{ $driver_model->created_at }}</td>

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

                <br>
                {{-- showign 1 to 6 total 7057  --}}
               <div class="laravell_paginate">
                <div class="row">

                    <div class="col-7">
                        Showing {{ $driver->firstItem() }} - {{ $driver->lastItem()}} Total {{ $driver->total() }}
                    </div>
                    <div class="col-5">
                       {!! $driver->appends(Request::all())->links(); !!}
                    </div>

                </div>
               </div>


               {{-- //'pagination.paginationlinks' --}}
                {{-- {{ $driver->links() }} --}}
            </div>
            <!-- /.card-body -->
        </div>

{{-- <script>
    function statusChange(){
        let status=document.getElementById("status");

        if(status.innerHTML="Inactive"){
            alert("active");
        status.innerHTML="Active";
        status.style.backgroundColor="green";
        }

        else if ( status.innerHTML="Active"){
            alert("inactive");
            status.innerHTML="Inactive";
        }
    }
</script> --}}







        {{-- <section class="content">
            <div class="container-fluid">
                <div class="row">

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

                            <div class="card">
                                <div class="card-header">

                                    <form id="form_id" method="get">
                                        <div class="row">
                                            <div class="col-3">
                                                <p for="">FIRST NAME</p>
                                                <input type="text" name="fname" id="fname"
                                                    placeholder="Enter First Name" class="form-control">


                                            </div>

                                            <div class="col-3">
                                                <p for="">LAST NAME</p>
                                                <input type="text" name="lname" id="lname"
                                                    placeholder="Enter Last Name" class="form-control">


                                            </div>
                                            <div class="col-3">
                                                <p for="">Email</p>
                                                <input type="text" class="form-control" placeholder="Email"
                                                    name="email">
                                            </div>

                                            <div class="col-3">
                                                <p for="">Mobile Number</p>
                                                <input type="text" class="form-control" placeholder="Mobile Number"
                                                    name="phone_number">
                                            </div>

                                            <div class="col-3">
                                                <p for="">Avability</p>
                                                <select name="is_available" id="" class="form-control">
                                                    <option value="">-Select Status-</option>
                                                    <option value="ON">ON</option>
                                                    <option value="OFF">OFF</option>

                                                </select>
                                            </div>


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

                                        <input type="button" class="btn btn-dark" id="clearbtn" value="CLEAR"
                                            onclick="myFunction()">

                                    </form>

                                </div>

                            </div>

                           <div class="card">
                                <table data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true">NO</th>
                                            <th data-sortable="true">FIRST NAME</th>
                                            <th data-sortable="true">LAST NAME</th>
                                            <th data-sortable="true">MOBILE NO</th>
                                            <th data-sortable="true">EMAIL</th>

                                            <th data-sortable="true">STATUS</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            @foreach ($driver as $key => $all_driver)
                                                <tr>
                                                    <td>{{ ($driver->currentpage() - 1) * $driver->perpage() + $key + 1 }}</td>
                                                    <td>{{ $all_driver->first_name }}</td>
                                                    <td>{{ $all_driver->last_name }}</td>
                                                    <td>{{ $all_driver->email }}</td>
                                                    <td>{{ $all_driver->phone_number }}</td>
                                                    <td>{{ $all_driver->category_id }}</td>
                                                    <td>
                                                        @if ($all_driver->is_available == 1)
                                                            <span style="color:green;">Available</span>
                                                        @else
                                                            <span style="color:red;">UnAvailable</span>
                                                        @endif
                                                    </td>
                                                    <td><a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                         </tbody>


                                    </tbody>

                                </table>

                                <br>

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



                            </div>

                    </div>
                    </div>

                </div>


        </section> --}}
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

    <script>
        // $(document).ready(function() {
        //     $('#search').on('keyup', function() {
        //         var query = $(this).val();
        //         // console.log(query);
        //         $.ajax({
        //             type: "GET",
        //             url: "search",
        //             data: {
        //                 'search': query
        //             },
        //             datatype: "DataType",
        //             success: function(data) {
        //                 $('#search_list').html(data);
        //               var data =   $('#search_list').html(data);
        //             }
        //         });
        //     });


        // });

        // $( document ).ready(function() {
        //     $.ajax({
        //             type: "GET",
        //             url: "all_driver",
        //             datatype: "DataType",
        //             success: function(data) {
        //                 $('#search_list').html(data);
        //             }
        //         });
        // });

        // function myFunction() {
        //     document.getElementById("form_id").reset();
        //     // console.log('asds');
        //     load_data();
        // }

        // var frm = $('#form_id');
        // $(document).ready(function() {
        //     load_data();
        // });


        // function load_data() {
        //     $.ajax({
        //         type: frm.attr('method'),
        //         url: 'search',
        //         data: frm.serialize(),
        //         success: function(data) {

        //             $('#search_list').html(data);
        //         },
        //     });
        // }

        // frm.submit(function(e) {

        //     e.preventDefault();
        //     load_data();
        // });




        // function myFunction(){
        //     event.preventDefault();

        //     var form = $('#form_id')[0];
        //     var data = new FormData(form);
        //     console.log(data);
        //       $.ajax({
        //         url:"search",
        //         method:"GET",
        //         data:{data:data},
        //         dataType:"json",
        //         success:function(data)
        //         {
        //             $('#search_list').html(data);

        //         }});

        //         console.log(data.values);
        //     for (const value of data.values()) {
        //          console.log(value);

        //     }

        //  }
    </script>


{{-- <script>
    $(document).ready(function(){

     $('#status').bootstrapToggle({
      on: 'Active',
      off: 'Deactive',
      onstyle: 'success',
      offstyle: 'danger'
     });

     $('#status').change(function(){
      if($(this).prop('checked'))
      {
       $('#hidden_status').val('Active');
      }
      else
      {
       $('#hidden_status').val('Deactive');
      }
     });

     $('#insert_data').on('submit', function(event){
      event.preventDefault();

     if($('#hidden_status').val() != '')
      {
    var hidden_status=$('#hidden_status').val();
       $.ajax({

        url:"insert.php",
        method:"POST",
        data:$(this).serialize(),
        success:function(data){

         if(data == 'done')
         {
          $('#insert_data')[0].reset();
          $('#status').bootstrapToggle('on');
          alert("Data Inserted");
         }
        }
       });
    }
     });

    });
    </script> --}}


    {{-- <script>


        function Check(){
        var frm = $('#Status_active');
        // console.log(frm);
        frm.submit(function (e) {

        e.preventDefault();
        $.ajax({
            console.log(frm);
        type: frm.attr('method'),
        // url: 'update_status',
        data: frm.serialize(),
        success: function (res) {
            if(res==1){
                $(".plz-wait").css("display", "none");
                swal("Submitted", "We Will Contact You Soon", "success");
                frm[0].reset();
                }
                else
                {
                $(".plz-wait").css("display", "none");
                swal("Error", "Please try again!", "error");
                    frm[0].reset();
                }
        },
        // error: function (data) {
        //     console.log(data);
        // },
        });
        });

        }
    </script> --}}




    <script>
        $(function() {
          $('.toggle-class').click(function() {

              var id = $(this).attr('info');
              var driver_log_status = $(this).attr('value');
            //   alert(is_shift_started);
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: 'status',
                  data: {'status': driver_log_status, '_id': id},

                  success: function(res){
                    var parsedData = JSON.parse(res);
                    // console.log(data);
                    var allData = parsedData.shift_status_updated;
                     var val_data = allData[0].driver_log_status;//only apply one column condition
                     $("#kvalue_post").val(val_data);

                  }
              });
          })
        })
      </script>
@endsection
