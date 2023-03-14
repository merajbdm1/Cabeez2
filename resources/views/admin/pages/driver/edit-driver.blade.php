{{--
<?php
echo '<pre>';
print_r($edit_driver->status == 'inactive' ? 'Inactive' : 'Active');
exit();

?> --}}
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
                                    <a type="button" href="{{ url('admin/driver') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Back

                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="quickForm" action="{{ url('admin/update_driver', $edit_driver->_id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="first_name"
                                                        class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->first_name }}" id="exampleFirstName"
                                                        placeholder="First Name">
                                                    @if ($errors->has('first_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLastName">Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="last_name"
                                                        class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->last_name }}" id="exampleLastName"
                                                        placeholder="Last Name">
                                                    @if ($errors->has('last_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Mobile Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="phone_number"
                                                        class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->phone_number }}"ss id="exampleMobileNumber"
                                                        placeholder="Mobile Number">
                                                    @if ($errors->has('phone_number'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleEmailAddress">Email Address <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" name="email"
                                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->email }}" id="exampleEmailAddress"
                                                        placeholder="Email">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleVehicleYear">Vehicle Year <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="vehicle_year"
                                                        class="form-control{{ $errors->has('vehicle_year') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->vehicle_year }}" id="exampleVehicleYear"
                                                        placeholder="YYYY">
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
                                                    <input type="text" name="car_registration_number"
                                                        class="form-control{{ $errors->has('car_registration_number') ? ' is-invalid' : '' }}"
                                                        id="VehicleRegistrations Number"
                                                        value="{{ $edit_driver->car_registration_number }}"
                                                        placeholder="Vehicle Registrations Number">
                                                    @if ($errors->has('car_registration_number'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('car_registration_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleVehicleCategory">Vehicle Category <span
                                                            class="text-danger">*</span></label>
                                                    <select name="category_id" id="" class="form-control">

                                                        @foreach ($vehicle_driv as $item)
                                                            @if ($edit_driver->category_id == $item->id)
                                                               <option selected disabled value="{{ $edit_driver->category_id }}" style="background-color: #0069d9;color:#fff;">
                                                                {{ $edit_driver->driver_vehicle_category->name }}</option>
                                                            @else
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Vehicle Make <span
                                                            class="text-danger">*</span></label>

                                                    <select name="brand_id" id="" class="form-control">
                                                        <option value="">--Select Make--</option>

                                                        @foreach ($vehicle_drive_make as $item)
                                                        @if ($edit_driver->brand_id == $item->id)
                                                           <option selected disabled value="{{ $edit_driver->brand_id }}" style="background-color: #0069d9;color:#fff;">
                                                            {{ $edit_driver->driver_vehicle_make->name }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->name }}</option>
                                                        @endif
                                                    @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleVehicleModel">Vehicle Model <span
                                                            class="text-danger">*</span></label>
                                                    <select name="model_id" id="" class="form-control">

                                                        <option value="">--Select model--</option>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="examplePUCExpiryDate">PUC Expiry Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" name="driver_puc_expiry_date"
                                                        class="form-control{{ $errors->has('driver_puc_expiry_date') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->driver_puc_expiry_date }}"
                                                        id="examplePUCExpiryDate" placeholder="PUC Expiry Date">
                                                    @if ($errors->has('driver_puc_expiry_date'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('driver_puc_expiry_date') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleDateofBirth">Date of Birth <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" name="date_of_birth"
                                                        class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->date_of_birth }}" id="exampleDateofBirth"
                                                        placeholder="Date of Birth">
                                                    @if ($errors->has('date_of_birth'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleBloodGroup">Blood Group <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="blood_group"
                                                        class="form-control{{ $errors->has('blood_group') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->blood_group }}" id="exampleBloodGroup"
                                                        placeholder="Blood Group">
                                                    @if ($errors->has('blood_group'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('blood_group') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleEmergencyNumber">Emergency Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="emergency_number"
                                                        class="form-control{{ $errors->has('emergency_number') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->emergency_number }}"
                                                        id="exampleEmergencyNumber" placeholder="Emergency Number">
                                                    @if ($errors->has('emergency_number'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('emergency_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleState">State <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="state"
                                                        class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->state }}" id="exampleState"
                                                        placeholder="State">
                                                    @if ($errors->has('state'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('state') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleCity">City <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="city"
                                                        class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->city }}" id="exampleCity"
                                                        placeholder="City">
                                                    @if ($errors->has('city'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('city') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="examplePostalCode">Postal Code <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="postal_code"
                                                        class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->postal_code }}" id="examplePostalCode"
                                                        placeholder="Postal Code">
                                                    @if ($errors->has('postal_code'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('postal_code') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleAddress">Address <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="address"
                                                        class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                        value="{{ $edit_driver->address }}" id="exampleAddress"
                                                        placeholder="Address">
                                                    @if ($errors->has('address'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Profile Picture <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="photo" accept="image/*" onchange="loadFile(event)"
                                                            value="{{ $edit_driver->photo }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('photo'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('photo') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->photo) }}"
                                                        id="preview_img_id" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Commercial Insurance <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="commercial_insurance" accept="image/*"
                                                            onchange="loadFile2(event)"
                                                            value="{{ $edit_driver->commercial_insurance }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file <span class="text-danger">*</span></label>
                                                        @if ($errors->has('commercial_insurance'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('commercial_insurance') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->commercial_insurance) }}"
                                                        id="preview_img_id2" class="img-fluid" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Driver's License Front Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="license_photo_front" accept="image/*"
                                                            onchange="loadFile3(event)"
                                                            value="{{ $edit_driver->license_photo_front }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file <span class="text-danger">*</span></label>
                                                        @if ($errors->has('license_photo_front'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('license_photo_front') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->license_photo_front) }}"
                                                        id="preview_img_id3" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Driver's License Back Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="license_photo_back" accept="image/*"
                                                            onchange="loadFile4(event)"
                                                            value="{{ $edit_driver->license_photo_back }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('license_photo_back'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('license_photo_back') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->license_photo_back) }}"
                                                        id="preview_img_id4" class="img-fluid" />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Aadhaar Front Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="aadhaar_image_front" accept="image/*"
                                                            onchange="loadFile5(event)"
                                                            value="{{ $edit_driver->aadhaar_image_front }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('aadhaar_image_front'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('aadhaar_image_front') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->aadhaar_image_front) }}"
                                                        id="preview_img_id5" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Aadhaar Back Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="aadhaar_image_back" accept="image/*"
                                                            onchange="loadFile6(event)"
                                                            value="{{ $edit_driver->aadhaar_image_back }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('aadhaar_image_back'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('aadhaar_image_back') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->aadhaar_image_back) }}"
                                                        id="preview_img_id6" class="img-fluid" />
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Rental Agreement Front Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="rental_agreement_front" accept="image/*"
                                                            onchange="loadFile7(event)"
                                                            value="{{ $edit_driver->rental_agreement_front }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('rental_agreement_front'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('rental_agreement_front') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->rental_agreement_front) }}"
                                                        id="preview_img_id7" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Rental Agreement Back Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="rental_agreement_back" accept="image/*"
                                                            onchange="loadFile8(event)"
                                                            value="{{ $edit_driver->rental_agreement_back }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('rental_agreement_back'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('rental_agreement_back') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->rental_agreement_back) }}"
                                                        id="preview_img_id8" class="img-fluid" />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">PAN Card <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="driver_pan_card" accept="image/*"
                                                            onchange="loadFile9(event)"
                                                            value="{{ $edit_driver->driver_pan_card }}">

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
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->driver_pan_card) }}"
                                                        id="preview_img_id9" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Vehicle Registration <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="registration_photo" accept="image/*"
                                                            onchange="loadFile10(event)"
                                                            value="{{ $edit_driver->registration_photo }}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('registration_photo'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('registration_photo') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $edit_driver->registration_photo) }}"
                                                        id="preview_img_id10" class="img-fluid" />
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Ride Type<span
                                                            class="text-danger">*</span></label>



                                                    <div class="custom-file">
                                                        <select id="driverStatus" class="form-control custom-select"
                                                            name="driver_ride_type">
                                                            <option>Select one</option>
                                                            <option value="Ev City"
                                                                {{ 'Ev City' == $edit_driver->driver_ride_type ? 'selected' : '' }}>
                                                                EV City</option>
                                                            <option value="Outstation"
                                                                {{ 'Outstation' == $edit_driver->driver_ride_type ? 'selected' : '' }}>
                                                                Out Station</option>
                                                            <option value="Rental"
                                                                {{ 'Rental' == $edit_driver->driver_ride_type ? 'selected' : '' }}>
                                                                Rental</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Working Hours<span
                                                            class="text-danger">*</span></label>

                                                    <div class="custom-file">
                                                        <label class="days" for="">Monday</label>
                                                        <label>Start</label>
                                                        <input type="time" name="mondaystartend[]" min="00:00"
                                                            max="18:00">
                                                        <label>End</label>
                                                        <input type="time" name="mondaystartend[]" min="00:00"
                                                            max="18:00">

                                                        @if ($errors->has('mondaystart'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('mondaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="custom-file">
                                                        <label class="days" for="">Tuesday</label>
                                                        <label> Start</label>
                                                        <input type="time" name="tuesdaystartend[]" min="00:00"
                                                            max="18:00">
                                                        <label>End</label>
                                                        <input type="time" name="tuesdaystartend[]" min="00:00"
                                                            max="18:00">

                                                        @if ($errors->has('tuesdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('tuesdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="days" for="">Wednesday</label>
                                                        <label> Start</label>
                                                        <input type="time" name="wednesdaystartend[]" min="00:00"
                                                            max="18:00">
                                                        <label>End</label>
                                                        <input type="time" name="wednesdaystartend[]" min="00:00"
                                                            max="18:00">

                                                        @if ($errors->has('wednesdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('wednesdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="days" for="">Thursday</label>
                                                        <label> Start</label>
                                                        <input type="time" name="thursdaystartend[]" min="00:00"
                                                            max="18:00">
                                                        <label>End</label>
                                                        <input type="time" name="thursdaystartend[]" min="00:00"
                                                            max="18:00">

                                                        @if ($errors->has('thursdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('thursdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="days" for="">Friday</label>
                                                        <label> Start</label>
                                                        <input type="time" name="fridaystartend[]" min="00:00"
                                                            max="18:00">
                                                        <label>End</label>
                                                        <input type="time" name="fridaystartend[]" min="00:00"
                                                            max="18:00">

                                                        @if ($errors->has('fridaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('fridaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="days" for="">Saturday</label>
                                                        <label> Start</label>
                                                        <input type="time" name="saturdaystartend[]" min="00:00"
                                                            max="18:00">
                                                        <label>End</label>
                                                        <input type="time" name="saturdaystartend[]" min="00:00"
                                                            max="18:00">

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

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="driverStatus">Document Status <span
                                                            class="text-danger">*</span></label>
                                                    <select id="driverStatus" class="form-control custom-select"
                                                        name="document_status">
                                                        <option value="">Select one</option>
                                                        <option value="verified"
                                                            {{ $edit_driver->document_status == 'verified' ? 'selected' : '' }}>
                                                            Verified</option>
                                                        <option value="pending"
                                                            {{ $edit_driver->document_status == 'pending' ? 'selected' : '' }}>
                                                            Pending</option>
                                                        <option value="missing"
                                                            {{ $edit_driver->document_status == 'missing' ? 'selected' : '' }}>
                                                            Missing</option>
                                                        {{-- <option value="{{ $edit_driver->document_status == 'pending'}}"
                                                    {{ $edit_driver->document_status === $edit_driver->document_status ? 'selected' : '' }}>Pending</option>

                                                <option value="{{ $edit_driver->document_status == 'missing'}}"
                                                    {{ $edit_driver->document_status === $edit_driver->document_status ? 'selected' : '' }}>Missing</option> --}}

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status <span
                                                            class="text-danger">*</span></label>
                                                    <select id="status" class="form-control custom-select"
                                                        name="status">
                                                        <option value="">Select status</option>
                                                        <option value="active"
                                                            {{ $edit_driver->status == 'active' ? 'selected' : '' }}>Active
                                                        </option>
                                                        <option value="pending"
                                                            {{ $edit_driver->status == 'pending' ? 'selected' : '' }}>
                                                            Pending</option>
                                                        <option value="document_missing"
                                                            {{ $edit_driver->status == 'document_missing' ? 'selected' : '' }}>
                                                            Document Missing</option>
                                                        <option value="inactive"
                                                            {{ $edit_driver->status == 'inactive' ? 'selected' : '' }}>
                                                            Inactive</option>
                                                        <option value="deleted"
                                                            {{ $edit_driver->status == 'deleted' ? 'selected' : '' }}>
                                                            Deleted</option>
                                                    </select>
                                                    @if ($errors->has('status'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
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
