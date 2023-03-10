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
                        <h1>Driver</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Driver</li>
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

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Driver</small></h3>
                                    <a type="button" href="{{ url('admin/driver') }}" class="btn btn-default float-right bg-primary">
                                        Back

                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="quickForm" action="{{ url('admin/update_driver',$edit_driver->_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="driver_first_name" class="form-control{{ $errors->has('driver_first_name') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_first_name}}"
                                                        id="exampleFirstName" placeholder="First Name" >
                                                        @if ($errors->has('driver_first_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLastName">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="driver_last_name" class="form-control{{ $errors->has('driver_last_name') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_last_name}}"
                                                        id="exampleLastName" placeholder="Last Name">
                                                        @if ($errors->has('driver_last_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_last_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Mobile Number <span class="text-danger">*</span></label>
                                                    <input type="number" name="driver_mobile_no" class="form-control{{ $errors->has('driver_mobile_no') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_mobile_no}}"ss
                                                        id="exampleMobileNumber" placeholder="Mobile Number">
                                                        @if ($errors->has('driver_mobile_no'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_mobile_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleEmailAddress">Email Address <span class="text-danger">*</span></label>
                                                    <input type="email" name="driver_email" class="form-control{{ $errors->has('driver_email') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_email}}"
                                                        id="exampleEmailAddress" placeholder="Email">
                                                        @if ($errors->has('driver_email'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleVehicleYear">Vehicle Year <span class="text-danger">*</span></label>
                                                    <input type="date" name="vehicle_year" class="form-control{{ $errors->has('vehicle_year') ? ' is-invalid' : '' }}" value="{{$edit_driver->vehicle_year}}"
                                                        id="exampleVehicleYear" placeholder="Vehicle Year">
                                                        @if ($errors->has('vehicle_year'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('vehicle_year') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="VehicleRegistrationsNumber">Vehicle Registrations
                                                        Number <span class="text-danger">*</span></label>
                                                    <input type="number" name="driver_vehicle_registration_number"
                                                        class="form-control{{ $errors->has('driver_vehicle_registration_number') ? ' is-invalid' : '' }}" id="VehicleRegistrations Number" value="{{$edit_driver->driver_vehicle_registration_number}}"
                                                        placeholder="Vehicle Registrations Number">
                                                        @if ($errors->has('driver_vehicle_registration_number'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_vehicle_registration_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Vehicle Make <span class="text-danger">*</span></label>
                                                    <input type="text" name="driver_vehicle_make" class="form-control{{ $errors->has('driver_vehicle_make') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_vehicle_make}}"
                                                        id="exampleMobileNumber" placeholder="Vehicle Make">
                                                        @if ($errors->has('driver_vehicle_make'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_vehicle_make') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleVehicleModel">Vehicle Model <span class="text-danger">*</span></label>
                                                    <input type="text" name="driver_vehicle_model" class="form-control{{ $errors->has('driver_vehicle_model') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_vehicle_model}}"
                                                        id="exampleVehicleModel" placeholder="Vehicle Model">
                                                        @if ($errors->has('driver_vehicle_model'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_vehicle_model') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleVehicleCategory">Vehicle Category <span class="text-danger">*</span></label>
                                                    <input type="year" name="driver_vehicle_category"
                                                        class="form-control{{ $errors->has('driver_vehicle_category') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_vehicle_category}}" id="exampleVehicleCategory"
                                                        placeholder="Vehicle Category">
                                                        @if ($errors->has('driver_vehicle_category'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_vehicle_category') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="examplePUCExpiryDate">PUC Expiry Date <span class="text-danger">*</span></label>
                                                    <input type="date" name="driver_puc_expiry_date"
                                                        class="form-control{{ $errors->has('driver_puc_expiry_date') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_puc_expiry_date}}" id="examplePUCExpiryDate"
                                                        placeholder="PUC Expiry Date">
                                                        @if ($errors->has('driver_puc_expiry_date'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_puc_expiry_date') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleDateofBirth">Date of Birth <span class="text-danger">*</span></label>
                                                    <input type="date" name="driver_dob" class="form-control{{ $errors->has('driver_dob') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_dob}}"
                                                        id="exampleDateofBirth" placeholder="Date of Birth">
                                                        @if ($errors->has('driver_dob'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_dob') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleBloodGroup">Blood Group <span class="text-danger">*</span></label>
                                                    <input type="text" name="driver_blood_group" class="form-control{{ $errors->has('driver_blood_group') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_blood_group}}"
                                                        id="exampleBloodGroup" placeholder="Blood Group">
                                                        @if ($errors->has('driver_blood_group'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_blood_group') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleEmergencyNumber">Emergency Number <span class="text-danger">*</span></label>
                                                    <input type="number" name="driver_emergency_number"
                                                        class="form-control{{ $errors->has('driver_emergency_number') ? ' is-invalid' :   '' }}" value="{{$edit_driver->driver_emergency_number}}" id="exampleEmergencyNumber"
                                                        placeholder="Emergency Number">
                                                        @if ($errors->has('driver_emergency_number'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_emergency_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleState">State <span class="text-danger">*</span></label>
                                                    <input type="text" name="driver_state" class="form-control{{ $errors->has('driver_state') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_state}}"
                                                        id="exampleState" placeholder="State">
                                                        @if ($errors->has('driver_state'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_state') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleCity">City <span class="text-danger">*</span></label>
                                                    <input type="text" name="driver_city" class="form-control{{ $errors->has('driver_city') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_city}}"
                                                        id="exampleCity" placeholder="City">
                                                        @if ($errors->has('driver_city'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_city') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="examplePostalCode">Postal Code <span class="text-danger">*</span></label>
                                                    <input type="number" name="driver_postal_code" class="form-control{{ $errors->has('driver_postal_code') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_postal_code}}"
                                                        id="examplePostalCode" placeholder="Postal Code">
                                                        @if ($errors->has('driver_postal_code'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_postal_code') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleAddress">Address <span class="text-danger">*</span></label>
                                                    <input type="text" name="driver_address" class="form-control{{ $errors->has('driver_address') ? ' is-invalid' : '' }}" value="{{$edit_driver->driver_address}}"
                                                        id="exampleAddress" placeholder="Address">
                                                        @if ($errors->has('driver_address'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Profile Picture <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_profile_picture" accept="image/*"
                                                            onchange="loadFile(event)" value="{{$edit_driver->driver_profile_picture}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('driver_profile_picture'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('driver_profile_picture') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_profile_picture) }}" id="preview_img_id" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Commercial Insurance <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_upload_commercial_insurance" accept="image/*"
                                                            onchange="loadFile2(event)" value="{{$edit_driver->driver_upload_commercial_insurance}}">

                                                                                <label class="custom-file-label" for="customFile">Choose
                                                                                    file <span class="text-danger">*</span></label>
                                                                                @if ($errors->has('driver_upload_commercial_insurance'))
                                                                                    <span class="invalid feedback" role="alert">
                                                                                        <strong>{{ $errors->first('driver_upload_commercial_insurance') }}</strong>
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                </div>
                                                    <div class="image-preview">
                                                        <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_upload_commercial_insurance) }}" id="preview_img_id2" class="img-fluid" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customFile">Upload Driver's License Front Side <span class="text-danger">*</span></label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="driver_license_front" accept="image/*"
                                                                onchange="loadFile3(event)" value="{{$edit_driver->driver_license_front}}">

                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file <span class="text-danger">*</span></label>
                                                            @if ($errors->has('driver_license_front'))
                                                                <span class="invalid feedback" role="alert">
                                                                    <strong>{{ $errors->first('driver_license_front') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_license_front) }}" id="preview_img_id3" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Driver's License Back Side <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_license_back" accept="image/*"
                                                            onchange="loadFile4(event)" value="{{$edit_driver->driver_license_back}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('driver_license_back'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('driver_license_back') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_license_back) }}" id="preview_img_id4" class="img-fluid" />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Aadhaar Front Side <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_aadhaar_front" accept="image/*"
                                                            onchange="loadFile5(event)" value="{{$edit_driver->driver_aadhaar_front}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('driver_aadhaar_front'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('driver_aadhaar_front') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_aadhaar_front) }}" id="preview_img_id5" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Aadhaar Back Side <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_aadhaar_back" accept="image/*"
                                                            onchange="loadFile6(event)" value="{{$edit_driver->driver_aadhaar_back}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('driver_aadhaar_back'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('driver_aadhaar_back') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_aadhaar_back) }}" id="preview_img_id6" class="img-fluid" />
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Rental Agreement Front Side <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_rental_agreement_front" accept="image/*"
                                                            onchange="loadFile7(event)" value="{{$edit_driver->driver_rental_agreement_front}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('driver_rental_agreement_front'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('driver_rental_agreement_front') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_rental_agreement_front) }}" id="preview_img_id7" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Rental Agreement Back Side <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_rental_agreement_back" accept="image/*"
                                                            onchange="loadFile8(event)" value="{{$edit_driver->driver_rental_agreement_back}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('driver_rental_agreement_back'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('driver_rental_agreement_back') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_rental_agreement_back) }}" id="preview_img_id8" class="img-fluid" />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">PAN Card <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_pan_card" accept="image/*"
                                                            onchange="loadFile9(event)" value="{{$edit_driver->driver_pan_card}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('driver_pan_card'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('driver_pan_card') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_pan_card) }}" id="preview_img_id9" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Vehicle Registration <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_vehicle_registration_image" accept="image/*"
                                                            onchange="loadFile10(event)" value="{{$edit_driver->driver_vehicle_registration_image}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('driver_vehicle_registration_image'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('driver_vehicle_registration_image') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/'. $edit_driver->driver_vehicle_registration_image) }}" id="preview_img_id10" class="img-fluid" />
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Ride Type<span
                                                            class="text-danger">*</span></label>



                                                    <div class="custom-file">




                                                        <select id="driverStatus" class="form-control custom-select" name="driver_ride_type">
                                                            <option>Select one</option>
                                                            <option value="Ev City" {{ ( 'Ev City' == $edit_driver->driver_ride_type ? "selected":"") }}>EV City</option>
                                                            <option value="Outstation" {{ ( 'Outstation' == $edit_driver->driver_ride_type ? "selected":"") }}>Out Station</option>
                                                            <option value="Rental" {{ ( 'Rental' == $edit_driver->driver_ride_type ? "selected":"") }}>Rental</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Working Hours<span
                                                            class="text-danger">*</span></label>

                                                    <div class="custom-file">
                                                        <label for="">Monday</label>
                                                            Start
                                                            <input type="time" name="mondaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->mondaystartend[0] }}">
                                                            End
                                                            <input type="time" name="mondaystartend[]"

                                                            min="00:00" max="18:00" value="{{ $edit_driver->mondaystartend[1] }}">

                                                        @if ($errors->has('mondaystart'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('mondaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="custom-file">
                                                        <label for="">Tuesday</label>
                                                            Start
                                                            <input type="time" name="tuesdaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->tuesdaystartend[0] }}">
                                                            End
                                                            <input type="time" name="tuesdaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->tuesdaystartend[1] }}">

                                                        @if ($errors->has('tuesdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('tuesdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label for="">Wednesday</label>
                                                            Start
                                                            <input type="time" name="wednesdaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->wednesdaystartend[0] }}">
                                                            End
                                                            <input type="time" name="wednesdaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->wednesdaystartend[1] }}">

                                                        @if ($errors->has('wednesdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('wednesdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label for="">Thursday</label>
                                                            Start
                                                            <input type="time" name="thursdaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->thursdaystartend[0] }}">
                                                            End
                                                            <input type="time" name="thursdaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->thursdaystartend[1] }}">

                                                        @if ($errors->has('thursdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('thursdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label for="">Friday</label>
                                                            Start
                                                            <input type="time" name="fridaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->fridaystartend[0] }}">
                                                            End
                                                            <input type="time" name="fridaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->fridaystartend[1] }}">

                                                        @if ($errors->has('fridaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('fridaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label for="">Saturday</label>
                                                            Start
                                                            <input type="time" name="saturdaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->saturdaystartend[0] }}">
                                                            End
                                                            <input type="time" name="saturdaystartend[]"
                                                            min="00:00" max="18:00" value="{{ $edit_driver->saturdaystartend[1] }}">

                                                        @if ($errors->has('saturdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('saturdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img id="preview_img_id10" class="img-fluid" />
                                                </div>
                                            </div>

                                        </div>




                                        <div class="form-group">
                                            <label for="driverStatus">Status <span class="text-danger">*</span></label>
                                            <select id="driverStatus" class="form-control custom-select" name="driver_status">
                                                @if ($edit_driver->driver_status == '1')
                                                <option value="{{ $edit_driver->driver_status }}"
                                                    {{ $edit_driver->driver_status === $edit_driver->driver_status? '1' : '0' }}>Verified</option>
                                                <option value="0">Inactive</option>
                                                @elseif ($edit_driver->driver_status == '0')
                                                <option value="{{ $edit_driver->driver_status }}"
                                                    {{ $edit_driver->driver_status === $edit_driver->driver_status? '0' : '1' }}>UnVerified</option>
                                                <option value="1">Active</option>
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
