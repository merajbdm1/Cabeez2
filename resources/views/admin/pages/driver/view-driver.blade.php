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

    .laravell_p .page-item.active .page-link {
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
    }
</style>


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
                            <input type="text" class="form-control" value="{{ request('email') }}" placeholder="Email"
                                name="email">
                        </div>

                        <div class="col-3">
                            <p for="">Mobile Number</p>
                            <input type="text" class="form-control" value="{{ request('phone_number') }}" placeholder="Mobile Number"
                                name="phone_number">
                        </div>

                        <div class="col-3">
                            <p for="">Vehicle Category</p>

                            <select name="category_id" id="" class="form-control">

                                <option value="" >-Select category-</option>
                                @foreach($driver as $vfg)
                                <option value="{{$vfg->category_id}}">{{$vfg->category_id}}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="col-3">
                            <p for="">Avability</p>
                            <select name="is_available" id="" class="form-control">
                                <option value="">-Select Avalibilty-</option>
                                <option value="1">Available</option>
                                <option value="0">UnAvailable</option>

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
                                <td class="text-center">{{ $driver_model->last_name }} </td>
                                <td class="text-center">{{ $driver_model->phone_number }}</td>
                                <td class="text-center">{{ $driver_model->email }}</td>


                                @php

                                @endphp
                                <td class="text-center">{{ $driver_model->category_id }}</td>
                                <td class="text-center">
                                    @if ($driver_model->is_available == '1')
                                        <span style="color:green">Available</span>
                                    @else
                                        <span style="color:red">Not Available</span>
                                    @endif
                                </td>

                                    <td>
                                    @if ($driver_model->is_shift_started == '1')
                                        <span style="color:green">ON</span>
                                    @else
                                        <span style="color:red">OFF</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="card-body">
                                        <input data-id="" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $driver_model->status='active' ? 'active' : '' }}>
                                    </div>
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
    {{-- <script>
     $check = document.querySelector('.pagination .page-item.active');
     $check.classList.remove('active');
    $(document).ready(function(){

     $(document).on('click', '.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
     });

     function fetch_data(page)
     {
      $.ajax({
       url:"driver/fetch_data?page="+page,
       success:function(data)
       {


        $('#search_list').html(data);
       }
      });
     }

    });
    </script> --}}

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
@endsection
