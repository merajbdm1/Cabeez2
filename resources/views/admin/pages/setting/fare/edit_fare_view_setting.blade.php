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
                        <li class="breadcrumb-item active">Edit Fare</li>
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


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Fare</small></h3>
                            <a type="button" href="{{ url('fare_view_setting') }}" class="btn btn-default float-right bg-primary">
                                View All Fares

                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        {{-- <form  action="{{ url('edit_fare_process',$editfareview->_id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFirstName">Vehicle Category <span class="text-danger">*</span></label>
                                            <input type="text" name="category_id" class="form-control" value="{{ $editfareview->category_id }}"  placeholder="Vehicle Category">
                                            @error('category_id')
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('category_id') }}</strong>
                                                        </span>
                                             @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Base Fare <span class="text-danger">*</span></label>
                                            <input type="number" name="base_fare" class="form-control" value="{{ $editfareview->base_fare }}" id="exampleLastName" placeholder="Base Fare">
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
                                            <input type="number" name="time_factor_for_travel" class="form-control" value="{{ $editfareview->time_factor_for_travel }}" id="exampleLastName" placeholder="Time Factor For Travel">
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
                                            <input type="number" name="rate_per_km_25_kms" class="form-control" value="{{ $editfareview->rate_per_km_25_kms }}" id="exampleLastName" placeholder="Rate Per km(< 25)">
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
                                            <input type="number" name="rate_per_km_25_to_50_kms" class="form-control" value="{{ $editfareview->rate_per_km_25_to_50_kms }}" id="exampleLastName" placeholder="Rate Per km(25 to 50 kms)">
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
                                            <input type="number" name="rate_per_km_50_to_100_kms" class="form-control" value="{{ $editfareview->rate_per_km_50_to_100_kms }}" id="exampleLastName" placeholder="Rate Per km(50 to 100 kms)">
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
                                            <input type="number" name="rate_per_km_100_to_250_kms" class="form-control" value="{{ $editfareview->rate_per_km_100_to_250_kms }}" id="exampleLastName" placeholder="Rate Per km(100 to 250 kms)">
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
                                            <input type="number" name="rate_per_km_250_to_500_kms" class="form-control" value="{{ $editfareview->rate_per_km_250_to_500_kms }}" id="exampleLastName" placeholder="Rate Per km(250 to 500 kms)">
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
                                            <input type="number" name="rate_per_km_500_kms" class="form-control" value="{{ $editfareview->rate_per_km_500_kms }}" id="exampleLastName" placeholder="Rate Per km(500 + kms)">
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
                                            <input type="number" name="minimum_fare" class="form-control" value="{{ $editfareview->minimum_fare }}" id="exampleLastName" placeholder="Minimum Fare">
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
                                            <input type="number" name="km_for_min_fare" class="form-control" value="{{ $editfareview->km_for_min_fare }}" id="exampleLastName" placeholder="Km For Min Fare">
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
                                            <select id="driverStatus" class="form-control custom-select" name="status">
                                                @if ($editfareview->status == '1')
                                                <option value="{{ $editfareview->status }}"
                                                    {{ $editfareview->status === $editfareview->status? '1' : '0' }}>Active</option>
                                                <option value="0">Inactive</option>
                                                @elseif ($editfareview->status == '0')
                                                <option value="{{ $editfareview->status }}"
                                                    {{ $editfareview->status === $editfareview->status? '0' : '1' }}>Inactive</option>
                                                <option value="1">Active</option>
                                                @endif
                                            </select>
                                        </div>

                                    </div>



                                    </div>


                                    <!-- /.card -->
                                </div>
                                <!--/.col (left) -->
                                <!-- right column -->
                                <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <!--/.col (right) -->
                            </div>
                        </form> --}}
                        <form  action="{{ url('edit_fare_process',$editfareview->_id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFirstName">Vehicle Category <span class="text-danger">*</span></label>
                                          <select name="category_id" id="" class="form-control">
                                            <option value="">-Select Vehicle Category-</option>
                                            <option value="" selected>{{ $editfareview->categories->name }}</option>
                                            @foreach ($all_vehicle_cat as $vehicle_category)
                                            @if($editfareview->categories->name === $vehicle_category->name )
                                            <option value="{{ $editfareview->categories->_id }}" selected>{{ $editfareview->categories->name }}</option>
                                            @else
                                            <option value="" >{{ $vehicle_category->name }}</option> 
                                            @endif
                                                </option>
                                            @endforeach
                                          </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Base Fare <span class="text-danger">*</span></label>
                                            <input type="number" name="base_fare" class="form-control" value="{{ $editfareview->base_fare }}" id="exampleLastName" placeholder="Base Fare">
                                                    @if ($errors->has('base_fare'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('base_fare') }}</strong>
                                                        </span>
                                                    @endif
                                        </div>

                                    </div>
                                 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Minimum Fare<span class="text-danger">*</span></label>
                                            <input type="number" name="minimum_fare" class="form-control" value="{{ $editfareview->minimum_fare }} id="exampleLastName" placeholder="Time Factor For Travel">
                                            @if ($errors->has('minimum_fare'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('minimum_fare') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">slab1 Rate Per km(0 < 25) <span class="text-danger">* </span></label>
                                            <input type="number" name="per_km_fare_slab1" class="form-control" value="{{ $editfareview->per_km_fare_slab1 }}" id="exampleLastName" placeholder="Rate Per km(< 25)">
                                            @if ($errors->has('per_km_fare_slab1'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('per_km_fare_slab1') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">slab2 Rate Per km(25 to 50 kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="rate_per_km_25_to_50_kms" class="form-control" value="{{ $editfareview->per_km_fare_slab2 }}" id="exampleLastName" placeholder="Rate Per km(25 to 50 kms)">
                                            @if ($errors->has('rate_per_km_25_to_50_kms'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('rate_per_km_25_to_50_kms') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">slab3 Rate Per km(50 to 100 kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="per_km_fare_slab2" class="form-control" value="{{ $editfareview->per_km_fare_slab3 }}" id="exampleLastName" placeholder="Rate Per km(50 to 100 kms)">
                                            @if ($errors->has('per_km_fare_slab2'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('per_km_fare_slab2') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">slab4 Rate Per km(100 to 250 kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="per_km_fare_slab3" class="form-control" value="{{ $editfareview->per_km_fare_slab4 }}" id="exampleLastName" placeholder="Rate Per km(100 to 250 kms)">
                                            @if ($errors->has('per_km_fare_slab3'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('per_km_fare_slab3') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">slab5 Rate Per km(250 to 500 kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="per_km_fare_slab5" class="form-control" value="{{ $editfareview->per_km_fare_slab5 }}" id="exampleLastName" placeholder="Rate Per km(250 to 500 kms)">
                                            @if ($errors->has('per_km_fare_slab5'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('per_km_fare_slab5') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">slab6 Rate Per km(500 + kms) <span class="text-danger">*</span></label>
                                            <input type="number" name="per_km_fare_slab6" class="form-control" value="{{ $editfareview->per_km_fare_slab6 }}" id="exampleLastName" placeholder="Rate Per km(500 + kms)">
                                            @if ($errors->has('per_km_fare_slab6'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('per_km_fare_slab6') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Per Minimum Fare <span class="text-danger">*</span></label>
                                            <input type="number" name="per_min_fare" class="form-control" value="{{ $editfareview->per_min_fare }}" id="exampleLastName" placeholder="Minimum Fare">
                                            @if ($errors->has('per_min_fare'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('per_min_fare') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Per Km Fare <span class="text-danger">*</span></label>
                                            <input type="number" name="per_km_fare" class="form-control" value="{{ $editfareview->per_km_fare }}" id="exampleLastName" placeholder="Km For Min Fare">
                                            @if ($errors->has('per_km_fare'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('per_km_fare') }}</strong>
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
