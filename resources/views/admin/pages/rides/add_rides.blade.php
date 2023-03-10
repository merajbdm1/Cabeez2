@extends('admin.layout.master')
@section('style')
    <style>
        .booking_data_r {
            display: flex;
        }

        .booking_data_r p {
            width: 88px;
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
                        <h1>Rides</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Rides</li>
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
                        @if ($message = Session::get('RidesDetailSuccess'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif @if ($message = Session::get('RidesDetailError'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <!-- jquery validation -->

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Rides</small></h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="quickForm" action="{{ url('admin/rides_process') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">Rider Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="driver_first_name"
                                                        class="form-control{{ $errors->has('driver_first_name') ? ' is-invalid' : '' }}"
                                                        id="exampleFirstName" placeholder="Rider Number">
                                                    @if ($errors->has('driver_first_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleLastName">Rider<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="driver_last_name"
                                                        class="form-control{{ $errors->has('driver_first_name') ? ' is-invalid' : '' }}"
                                                        id="exampleLastName" placeholder="Rider">
                                                    @if ($errors->has('driver_last_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_last_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Driver<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="driver_mobile_no"
                                                        class="form-control{{ $errors->has('driver_mobile_no') ? ' is-invalid' : '' }}"
                                                        id="exampleMobileNumber" placeholder="Driver">
                                                    @if ($errors->has('driver_mobile_no'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_mobile_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleEmailAddress">Rides Status<span
                                                            class="text-danger">*</span></label>
                                                    <select id="driverStatus" class="form-control custom-select"
                                                        name="driver_status">
                                                        <option selected disabled>Select one</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    @if ($errors->has('driver_status'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleVehicleYear">Payement Status <span
                                                            class="text-danger">*</span></label>
                                                    <select id="driverStatus" class="form-control custom-select"
                                                        name="driver_status">
                                                        <option selected disabled>Select one</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    @if ($errors->has('driver_status'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="VehicleRegistrationsNumber">Payement Status
                                                        Number <span class="text-danger">*</span></label>
                                                    <select id="driverStatus" class="form-control custom-select"
                                                        name="driver_status">
                                                        <option selected disabled>Select one</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    @if ($errors->has('driver_status'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Payment Id <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="driver_vehicle_make"
                                                        class="form-control{{ $errors->has('driver_vehicle_make') ? ' is-invalid' : '' }}"
                                                        id="exampleMobileNumber" placeholder="Payment Id">
                                                    @if ($errors->has('driver_vehicle_make'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_vehicle_make') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleVehicleModel">Booking With Date Range <span
                                                            class="text-danger">*</span></label>
                                                    <div class="booking_data_r">
                                                        <input type="text" name="driver_vehicle_model"
                                                            class="form-control{{ $errors->has('driver_vehicle_model') ? ' is-invalid' : '' }}"
                                                            id="exampleVehicleModel" placeholder="From Date">
                                                        <p> &nbsp; To &nbsp;</p>
                                                        <input type="text" name="driver_vehicle_model"
                                                            class="form-control{{ $errors->has('driver_vehicle_model') ? ' is-invalid' : '' }}"
                                                            id="exampleVehicleModel" placeholder="To Date">
                                                    </div>
                                                    @if ($errors->has('driver_vehicle_model'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_vehicle_model') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
@endsection
