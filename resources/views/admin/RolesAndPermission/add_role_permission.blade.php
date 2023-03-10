@extends('admin.layout.master')
@section('style')
    <style>
        .booking_data_r {
            display: flex;
        }

        .booking_data_r p {
            width: 88px;
        }

        .acc-container {

            width: 100%;
        }

        .acc {
            margin-bottom: 10px;
        }

        .acc-head {
            background-color: rgb(217 217 209 / 60%);
            padding: 16px 5px 5px 12px;
            font-size: 18px;
            position: relative;
            cursor: pointer;
        }

        .acc-head::before,
        .acc-head::after {
            content: '';
            position: absolute;
            top: 50%;
            background-color: #252222fa;
            transition: all .3s;
        }

        .acc-head::before {
            right: 30px;
            width: 3px;
            height: 20px;
            margin-top: -10px;
        }

        .acc-head::after {
            right: 21px;
            width: 20px;
            height: 3px;
            margin-top: -2px;
        }

        .acc-head p {
            color: #1f1d1d;
            font-weight: bold;
        }

        .acc-content {
            padding: 15px 10px;
            display: none;
        }

        .acc-head.active::before {
            transform: rotate(90deg);
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Role & Permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Role & Permission</li>
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
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif @if ($message = Session::get('fail'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <!-- jquery validation -->

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Role & Permission</small></h3>
                                    <a type="button" href="{{ url('role_list_and_permission') }}"
                                        class="btn btn-default float-right bg-primary">
                                        View Permission & Roles

                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="quickForm" action="{{ url('role_permission_post') }}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">Role Name</label>
                                                    <input type="text" name="role_name" class="form-control"
                                                        id="exampleFirstName" placeholder="Enter Role Name">
                                                    @if ($errors->has('role_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('role_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Accordion -->
                                        <div class="acc-container">
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Driver</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox" value="Add"
                                                                name="driver_permissions[]">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="driver_permissions[]" value="Edit">
                                                        </td>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="driver_permissions[]" value="Delete">

                                                        </td>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="driver_permissions[]" value="View">

                                                        </td>

                                                    </p>
                                                </div>
                                            </div>


                                            
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Riders</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="riders_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="riders_permissions[]" value="Edit">
                                                        </td>

                                                        <?php 
                                                            $check_role= Session::get('status');
                                                           
                                                
                                                                if($check_role == '1')//Developer and Super Admin
                                                                  { 
                                                              ?>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="riders_permissions[]" value="Delete">

                                                        </td>

                                                        <?php }?>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="riders_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>

                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Rides</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="rides_persmissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="rides_persmissions[]" value="Edit">
                                                        </td>
                                                        <?php 
                                                        $check_role= Session::get('status');
                                                       
                                            
                                                            if($check_role == '1')//Developer and Super Admin
                                                              { 
                                                          ?>

                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="rides_persmissions[]" value="Delete">
                                                        </td>

                                                        <?php }?>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="rides_persmissions[]" value="View">

                                                        </td>

                                                    </p>
                                                </div>
                                            </div>

                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Promocode</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="promocode_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="promocode_permissions[]" value="Edit">
                                                        </td>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="promocode_permissions[]" value="Delete">

                                                        </td>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="promocode_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Reports</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="reports_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="reports_permissions[]" value="Edit">
                                                        </td>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="reports_permissions[]" value="Delete">

                                                        </td>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="reports_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Manual Ride Booking</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="manual_ride_booking_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="manual_ride_booking_permissions[]" value="Edit">
                                                        </td>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="manual_ride_booking_permissions[]" value="Delete">

                                                        </td>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="manual_ride_booking_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Riders Reviews</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="rider_reviews_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="rider_reviews_permissions[]" value="Edit">
                                                        </td>


                                                       
                                                                    <td>
                                                                        <label for="">Delete</label>&nbsp;
                                                                        <input class="checkbox no-wh permission_check"
                                                                            id="permission-1-8" type="checkbox"
                                                                            name="rider_reviews_permissions[]" value="Delete">
            
                                                                    </td>
            
                                                            
                                                     

                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="rider_reviews_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Drivers Reviews</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="driver_reviews_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="driver_reviews_permissions[]" value="Edit">
                                                        </td>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="driver_reviews_permissions[]" value="Delete">

                                                        </td>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="driver_reviews_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Vehicle Category</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_categories_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_categories_permissions[]" value="Edit">
                                                        </td>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_categories_permissions[]" value="Delete">

                                                        </td>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_categories_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Vehicle Make</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_make_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_make_permissions[]" value="Edit">
                                                        </td>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_make_permissions[]" value="Delete">

                                                        </td>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_make_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>
                                            <div class="acc">
                                                <div class="acc-head">
                                                    <p>Vehicle Model</p>
                                                </div>
                                                <div class="acc-content">
                                                    <p>
                                                        <td>
                                                            <label for="">Add</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_model_permissions[]" value="Add">

                                                        </td>
                                                        <td>
                                                            <label for="">Edit</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_model_permissions[]" value="Edit">
                                                        </td>
                                                        <td>
                                                            <label for="">Delete</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_model_permissions[]" value="Delete">

                                                        </td>
                                                        <td>
                                                            <label for="">View</label>&nbsp;
                                                            <input class="checkbox no-wh permission_check"
                                                                id="permission-1-8" type="checkbox"
                                                                name="vehicle_model_permissions[]" value="View">

                                                        </td>


                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save Role Permission</button>
                                    </div>
                                </form>
                            </div>



                            <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.acc-container .acc:nth-child(1) .acc-head').addClass('active');
            $('.acc-container .acc:nth-child(1) .acc-content').slideDown();
            $('.acc-head').on('click', function() {
                if ($(this).hasClass('active')) {
                    $(this).siblings('.acc-content').slideUp();
                    $(this).removeClass('active');
                } else {
                    $('.acc-content').slideUp();
                    $('.acc-head').removeClass('active');
                    $(this).siblings('.acc-content').slideToggle();
                    $(this).toggleClass('active');
                }
            });
        });
    </script>
@endsection
