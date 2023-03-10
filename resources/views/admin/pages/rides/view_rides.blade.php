@extends('admin.layout.master')
@section('style')
    <style>


    </style>
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
                            <li class="breadcrumb-item active">Rides</li>
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

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">All Rides</h3>
                                    <a type="button" href="{{ url('admin/add_driver') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Add Driver
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-responsive" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Rider Number</th>
                                                <th>Rider</th>
                                                <th>Driver</th>
                                                <th>Rides Status*</th>
                                                <th>Payement Status </th>
                                                <th>Payement Status Number</th>
                                                <th>Payment Id</th>
                                                <th>Booking With Date Range</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($driver as $driver_model)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $driver_model->driver_first_name }}</td>
                                                    <td>{{ $driver_model->driver_last_name }}
                                                    </td>
                                                    <td>{{ $driver_model->driver_mobile_no }}</td>
                                                    <td>{{ $driver_model->driver_email }}</td>
                                                    <td>{{ $driver_model->vehicle_year }}</td>

                                                    <td>{{ $driver_model->driver_vehicle_registration_number }}</td>
                                                    <td>{{ $driver_model->driver_vehicle_make }}</td>
                                                    <td>{{ $driver_model->driver_vehicle_model }}</td>
                                                    <td>{{ $driver_model->driver_vehicle_category }}</td>
                                                    <td>{{ $driver_model->driver_puc_expiry_date }}</td>
                                                    <td>{{ $driver_model->driver_dob }}</td>
                                                    <td>{{ $driver_model->driver_blood_group }}</td>
                                                    <td>{{ $driver_model->driver_emergency_number }}</td>
                                                    <td>{{ $driver_model->driver_state }}</td>
                                                    <td>{{ $driver_model->driver_city }}</td>
                                                    <td>{{ $driver_model->driver_postal_code }}</td>
                                                    <td>{{ $driver_model->driver_address }}</td>
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
                                                    <td>
                                                        @if ($driver_model->driver_status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" class="btn btn-info"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <a href="{{ url('admin/edit_driver', $driver_model->_id) }}"
                                                                class="btn btn-primary"><i
                                                                    class="fas fa-pencil-alt"></i></a>

                                                            <a href="{{ url('admin/delete_driver', $driver_model->_id) }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
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
