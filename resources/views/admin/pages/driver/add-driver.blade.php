
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
                            <li class="breadcrumb-item active">Add Driver</li>
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
                                    <h3 class="card-title">Add Driver</small></h3>
                                    <a type="button" href="{{ url('admin/driver') }}" class="btn btn-default float-right bg-primary">
                                        Back

                                    </a>
                                </div>


                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="quickForm" action="{{ url('admin/driver_process') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="first_name"
                                                        class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                        id="exampleFirstName" placeholder="First Name" value="{{old('first_name')}}">
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
                                                        class="form-control{{ $errors->has('driver_first_name') ? ' is-invalid' : '' }}"
                                                        id="exampleLastName" placeholder="Last Name" value="{{old('last_name')}}">
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
                                                        id="exampleMobileNumber" placeholder="Mobile Number" value="{{old('phone_number')}}">
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
                                                        id="exampleEmailAddress" placeholder="Email" value="{{old('email')}}">
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
                                                        id="exampleVehicleYear" placeholder="YYYY" value="{{old('vehicle_year')}}" min="1999" max="2050">
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
                                                    <input type="number" name="car_registration_number"
                                                        class="form-control{{ $errors->has('car_registration_number') ? ' is-invalid' : '' }}"
                                                        id="VehicleRegistrations Number"
                                                        placeholder="Vehicle Registrations Number" value="{{old('car_registration_number')}}">
                                                    @if ($errors->has('car_registration_number'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('car_registration_number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>


                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleVehicleCategory">Vehicle Category <span
                                                            class="text-danger">*</span></label>
                                                    <select name="category_id" id="" class="form-control">
                                                        <option value="">--Select Category--</option>
                                                          @foreach($vehicle_driv as $key => $value)
                                                                <option value="category_id">{{$value->name}}</option>
                                                          @endforeach

                                                    </select>
                                                </div>

                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label for="inputStatus">Vehicle Category</label>
                                                <select id="inputStatus" class="form-control custom-select" name="category_id">
                                                  <option selected disabled>--Select Category--</option>
                                                    @foreach ($vehicle_driv as $vehicleCategoryvalue)
                                                <option value="{{ $vehicleCategoryvalue->category_id }}"> {{ $vehicleCategoryvalue->parent_id == '0' ? $vehicleCategoryvalue->name : '.....'.$vehicleCategoryvalue->name }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                               --}}
                                               <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="inputStatus">Parent Category</label>
                                                  @include('admin.pages.nested_sub_cat')
                                                 <select  id="inputStatus" class="form-control custom-select" name="parent_id">
                                                  <option selected disabled>Select one</option>
                                                 
                                                    <?php echo displayCategories($vehicle_driv); ?>
                                                 </select>
                                                </select>
                                              </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Vehicle Make <span
                                                            class="text-danger">*</span></label>
                                                        <select name="brand_id" id="" class="form-control">
                                                            <option value="">--Select Make--</option>
                                                            @foreach($veh_make as $key => $value)
                                                            <option value="brand_id">{{$value->name}}</option>
                                                          @endforeach
                                                        </select>

                                                    {{-- <input type="text" name="driver_vehicle_make"
                                                        class="form-control{{ $errors->has('driver_vehicle_make') ? ' is-invalid' : '' }}"
                                                        id="exampleMobileNumber" placeholder="Vehicle Make" value="{{old('driver_vehicle_make')}}"> --}}
                                                    {{-- @if ($errors->has('brand_id'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('brand_id') }}</strong>
                                                        </span>
                                                    @endif --}}
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleVehicleModel">Vehicle Model <span
                                                            class="text-danger">*</span></label>
                                                            <select name="model_id" id="" class="form-control">
                                                                <option value="">--Select Make--</option>
                                                                @foreach($veh_modelop as $key => $value)
                                                                <option value="model_id">{{$value->name}}</option>
                                                              @endforeach

                                                            </select>

                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="examplePUCExpiryDate">PUC Expiry Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" name="puc_expiry_date"
                                                        class="form-control{{ $errors->has('puc_expiry_date') ? ' is-invalid' : '' }}"
                                                        id="examplePUCExpiryDate" placeholder="PUC Expiry Date" value="{{old('puc_expiry_date')}}">
                                                    @if ($errors->has('puc_expiry_date'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('puc_expiry_date') }}</strong>
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
                                                        id="exampleDateofBirth" placeholder="Date of Birth" value="{{old('date_of_birth')}}">
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
                                                        id="exampleBloodGroup" placeholder="Blood Group" value="{{old('blood_group')}}">
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
                                                        id="exampleEmergencyNumber" placeholder="Emergency Number" value="{{old('emergency_number')}}">
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
                                                        id="exampleState" placeholder="State" value="{{old('state')}}">
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
                                                        id="exampleCity" placeholder="City" value="{{old('city')}}">
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
                                                        id="examplePostalCode" placeholder="Postal Code" value="{{old('postal_code')}}">
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
                                                        id="exampleAddress" placeholder="Address" value="{{old('address')}}">
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
                                                        <input type="file" class="custom-file-input" id="customFile"`
                                                            name="photo"
                                                            onchange="loadFile(event)" value="{{old('photo')}}">

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
                                                    <img id="preview_img_id" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Commercial Insurance <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="commercial_insurance"
                                                            onchange="loadFile2(event)" value="{{old('commercial_insurance')}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('commercial_insurance'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('commercial_insurance') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img id="preview_img_id2" class="img-fluid" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Driver's License Front Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="license_photo_front"
                                                            onchange="loadFile3(event)" value="{{old('license_photo_front')}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('license_photo_front'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('license_photo_front') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img id="preview_img_id3" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Driver's License Back Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="license_photo_back"
                                                            onchange="loadFile4(event)" value="{{old('license_photo_back')}}">

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
                                                    <img id="preview_img_id4" class="img-fluid" />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Aadhaar Front Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="aadhaar_image_front"
                                                            onchange="loadFile5(event)" value="{{old('aadhaar_image_front')}}">

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
                                                    <img id="preview_img_id5" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Aadhaar Back Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="aadhaar_image_back"
                                                            onchange="loadFile6(event)" value="{{old('aadhaar_image_back')}}">

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
                                                    <img id="preview_img_id6" class="img-fluid" />
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Rental Agreement Front Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="rental_agreement_front"
                                                            onchange="loadFile7(event)" value="{{old('rental_agreement_front')}}">

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
                                                    <img id="preview_img_id7" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Rental Agreement Back Side <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="rental_agreement_back"
                                                            onchange="loadFile8(event)" value="{{old('rental_agreement_back')}}">

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
                                                    <img id="preview_img_id8" class="img-fluid" />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">PAN Card <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="pan_card"
                                                            onchange="loadFile9(event)" value="{{old('pan_card')}}">

                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                        @if ($errors->has('pan_card'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('pan_card') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="image-preview">
                                                    <img id="preview_img_id9" class="img-fluid" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Upload Vehicle Registration <span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="registration_photo"
                                                            onchange="loadFile10(event)" value="{{old('registration_photo')}}">

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
                                                    <img id="preview_img_id10" class="img-fluid" />
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Ride Type<span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                       <select name="driver_ride_type" id="" class="form-control">
                                                        <option value="" >Select</option>
                                                        <option value="Ev City" >EV City</option>
                                                        <option value="Outstation" >Out Station</option>
                                                        <option value="Rental" >Rental</option>
                                                       </select>

                                                    </div>
                                                </div>


                                                <div class="image-preview">
                                                    <img id="preview_img_id10" class="img-fluid" />
                                                </div>
                                               </div> --}}

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customFile">Working Hours<span
                                                            class="text-danger">*</span></label>

                                                    <div class="custom-file">
                                                        <label class="days" for="">Monday</label>
                                                            <label>Start</label>
                                                            <input type="time" name="mondaystartend[]"
                                                            min="00:00" max="18:00" >
                                                            <label>End</label>
                                                            <input type="time" name="mondaystartend[]"

                                                            min="00:00" max="18:00" >

                                                        @if ($errors->has('mondaystart'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('mondaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="custom-file">
                                                        <label class="days" for="">Tuesday</label>
                                                        <label> Start</label>
                                                            <input type="time" name="tuesdaystartend[]"
                                                            min="00:00" max="18:00" >
                                                            <label>End</label>
                                                            <input type="time" name="tuesdaystartend[]"
                                                            min="00:00" max="18:00" >

                                                        @if ($errors->has('tuesdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('tuesdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="days" for="">Wednesday</label>
                                                        <label> Start</label>
                                                            <input type="time" name="wednesdaystartend[]"
                                                            min="00:00" max="18:00" >
                                                            <label>End</label>
                                                            <input type="time" name="wednesdaystartend[]"
                                                            min="00:00" max="18:00" >

                                                        @if ($errors->has('wednesdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('wednesdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="days" for="">Thursday</label>
                                                        <label> Start</label>
                                                            <input type="time" name="thursdaystartend[]"
                                                            min="00:00" max="18:00" >
                                                            <label>End</label>
                                                            <input type="time" name="thursdaystartend[]"
                                                            min="00:00" max="18:00" >

                                                        @if ($errors->has('thursdaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('thursdaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="days" for="">Friday</label>
                                                        <label> Start</label>
                                                            <input type="time" name="fridaystartend[]"
                                                            min="00:00" max="18:00" >
                                                            <label>End</label>
                                                            <input type="time" name="fridaystartend[]"
                                                            min="00:00" max="18:00" >

                                                        @if ($errors->has('fridaystartend'))
                                                            <span class="invalid feedback" role="alert">
                                                                <strong>{{ $errors->first('fridaystartend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="days" for="">Saturday</label>
                                                        <label> Start</label>
                                                            <input type="time" name="saturdaystartend[]"
                                                            min="00:00" max="18:00" >
                                                            <label>End</label>
                                                            <input type="time" name="saturdaystartend[]"
                                                            min="00:00" max="18:00" >

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
                                                <label for="driverStatus">Document Status <span class="text-danger">*</span></label>
                                                <select id="driverStatus" class="form-control custom-select"
                                                    name="document_status">
                                                    <option selected disabled>Select one</option>
                                                    <option value="verified">Verified</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="missing">Missing</option>
                                                </select>
                                                @if ($errors->has('document_status'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('document_status') }}</strong>
                                                    </span>
                                                @endif
                                              </div>
                                            </div>



                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select id="status" class="form-control custom-select"
                                                name="status">
                                                <option selected disabled>Select one</option>
                                                <option value="active">Active</option>
                                                <option value="pending">Pending</option>
                                                <option value="inactive">Inactive</option>
                                                <option value="deleted">Deleted</option>
                                                <option value="document_missing">Document missing</option>
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
