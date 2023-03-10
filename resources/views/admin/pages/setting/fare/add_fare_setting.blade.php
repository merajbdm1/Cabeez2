@extends('admin.layout.master')
@section('style')
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fare</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Fare</li>
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
                    @if ($message = Session::get('success_message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif @if ($message = Session::get('fail_message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <!-- jquery validation -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Fare</small></h3>
                            <a type="button" href="{{ url('fare_view_setting') }}" class="btn btn-default float-right bg-primary">
                                View All Fares

                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form  action="{{ url('fare_process') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFirstName">Vehicle Category <span class="text-danger">*</span></label>
                                            <input type="text" name="vehicle_category" class="form-control" value="{{ old('vehicle_category') }}" id="exampleFirstName" placeholder="Vehicle Category">
                                            @if ($errors->has('vehicle_category'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('vehicle_category') }}</strong>
                                                        </span>
                                                    @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Base Fare <span class="text-danger">*</span></label>
                                            <input type="number" name="base_fare" class="form-control" value="{{ old('base_fare') }}" id="exampleLastName" placeholder="Base Fare">
                                            @if ($errors->has('base_fare'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('base_fare') }}</strong>
                                                        </span>
                                                    @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Time Factor For Travel <span class="text-danger">*</span></label>
                                            <input type="number" name="time_factor_for_travel" class="form-control" value="{{ old('time_factor_for_travel') }}" id="exampleLastName" placeholder="Time Factor For Travel">
                                            @if ($errors->has('time_factor_for_travel'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('time_factor_for_travel') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Rate Per km(< 25) <span class="text-danger">*</span></label>
                                            <input type="number" name="rate_per_km_25_kms" class="form-control" value="{{ old('rate_per_km_25_kms') }}" id="exampleLastName" placeholder="Rate Per km(< 25)">
                                            @if ($errors->has('rate_per_km_25_kms'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('rate_per_km_25_kms') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Rate Per km(25 to 50 kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="rate_per_km_25_to_50_kms" class="form-control" value="{{ old('rate_per_km_25_to_50_kms') }}" id="exampleLastName" placeholder="Rate Per km(25 to 50 kms)">
                                            @if ($errors->has('rate_per_km_25_to_50_kms'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('rate_per_km_25_to_50_kms') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Rate Per km(50 to 100 kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="rate_per_km_50_to_100_kms" class="form-control" value="{{ old('rate_per_km_50_to_100_kms') }}" id="exampleLastName" placeholder="Rate Per km(50 to 100 kms)">
                                            @if ($errors->has('rate_per_km_50_to_100_kms'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('rate_per_km_50_to_100_kms') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Rate Per km(100 to 250 kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="rate_per_km_100_to_250_kms" class="form-control" value="{{ old('rate_per_km_100_to_250_kms') }}" id="exampleLastName" placeholder="Rate Per km(100 to 250 kms)">
                                            @if ($errors->has('rate_per_km_100_to_250_kms'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('rate_per_km_100_to_250_kms') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Rate Per km(250 to 500 kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="rate_per_km_250_to_500_kms" class="form-control" value="{{ old('rate_per_km_250_to_500_kms') }}" id="exampleLastName" placeholder="Rate Per km(250 to 500 kms)">
                                            @if ($errors->has('rate_per_km_250_to_500_kms'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('rate_per_km_250_to_500_kms') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Rate Per km(500 + kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="rate_per_km_500_kms" class="form-control" value="{{ old('rate_per_km_500_kms') }}" id="exampleLastName" placeholder="Rate Per km(500 + kms)">
                                            @if ($errors->has('rate_per_km_500_kms'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('rate_per_km_500_kms') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Minimum Fare <span class="text-danger">*</span></label>
                                            <input type="number" name="minimum_fare" class="form-control" value="{{ old('minimum_fare') }}" id="exampleLastName" placeholder="Minimum Fare">
                                            @if ($errors->has('minimum_fare'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('minimum_fare') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Km For Min Fare <span class="text-danger">*</span></label>
                                            <input type="number" name="km_for_min_fare" class="form-control" value="{{ old('km_for_min_fare') }}" id="exampleLastName" placeholder="Km For Min Fare">
                                            @if ($errors->has('km_for_min_fare'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('km_for_min_fare') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Status <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" id="cars">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                           
                                            </select>     
                                        </div>

                                    </div>



                                    <!-- /.card -->
                                </div>
                                <!--/.col (left) -->
                                <!-- right column -->
                                <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                                <!--/.col (right) -->
                            </div>
                        </form>
                            <!-- /.row -->
                    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection