@extends('admin.layout.master')
@section('style')
@endsection
<style>
    nav svg {
        max-height: 10px;
    }
</style>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ride Information</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Ride Information</li>
                          
                        </ol>
                            
                    </div>
                   
                </div>
                <div class="float-right">    <a type="button" href="{{ url('book_now') }}" class="btn btn-default bg-primary">
                    Back
                </a></div>
            
               
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
           
            <div class="container-fluid">
              
                <div class="row">
                  
                       
                   
                    <!-- left column -->
                    <div class="col-md-12">
                       
                            <!-- jquery validation -->
                           
                            <div class="card">

                                
                                <!-- /.card-header -->
                               
                                <div class="card-body">

                                    
                                    <table class="table table-bordered table-striped" id="example1">
                                       
                                            <tbody>
                                                
                                                <tr>
                                                    <th>Rider Number</th>    
                                                    <td>{{$showlistitem->ride_number}}</td>
                                                </tr>    
                                                <tr>
                                                    <th>Pickup Address</th>    
                                                    <td>{{ $showlistitem->pick_up_address}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Pickup Postcode</th>    
                                                    <td>{{ $showlistitem->pick_up_postcode}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Pickup Latitude</th>    
                                                    <td>{{ $showlistitem->pick_up_latitude}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Pickup Longitude</th>    
                                                    <td>{{ $showlistitem->pick_up_longitude}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Drop Off Address</th>    
                                                    <td>{{ $showlistitem->drop_off_address}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Drop Off Postcode</th>    
                                                    <td>{{ $showlistitem->drop_off_postcode}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Drop Off Postcode</th>    
                                                    <td>{{ $showlistitem->drop_off_postcode}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Drop Off Latitude</th>    
                                                    <td>{{ $showlistitem->drop_off_latitude}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Drop Off Longitude</th>    
                                                    <td>{{ $showlistitem->drop_off_longitude}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Accept Latitude</th>    
                                                    <td>{{ $showlistitem->accept_latitude}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Accept Longitude</th>    
                                                    <td>{{ $showlistitem->accept_longitude}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Start Longitude</th>    
                                                    <td>{{ $showlistitem->start_longitude}}</td>
                                                </tr>

                                                <tr>
                                                    <th>End Latitude</th>    
                                                    <td>{{ $showlistitem->end_latitude}}</td>
                                                </tr>

                                                <tr>
                                                    <th>End Longitude</th>    
                                                    <td>{{ $showlistitem->end_longitude}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Passenger Capacity</th>    
                                                    <td>{{ $showlistitem->passenger_capacity}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Accept Date</th>    
                                                    <td>{{ $showlistitem->accept_date}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Arrive Date</th>    
                                                    <td>{{ $showlistitem->arrive_date}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Start Date</th>    
                                                    <td>{{ $showlistitem->start_date}}</td>
                                                </tr>
                                                <tr>
                                                    <th>End Date</th>    
                                                    <td>{{ $showlistitem->end_date}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Calling Pin</th>    
                                                    <td>{{ $showlistitem->calling_pin}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Otp</th>    
                                                    <td>{{ $showlistitem->otp}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Is Otp Verified</th>    
                                                    <td>{{ $showlistitem->is_otp_verified}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Rider Amount</th>    
                                                    <td>&#8377;{{ $showlistitem->ride_amount}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Rider Amount Wiithout Fee</th>    
                                                    <td>&#8377;{{ $showlistitem->ride_amount_without_fee}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ride KM</th>    
                                                    <td>{{ $showlistitem->ride_km}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Estimate Time</th>    
                                                    <td>{{ $showlistitem->estimate_time}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Actual Time</th>    
                                                    <td>{{ $showlistitem->actual_time}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Car Registration Number</th>    
                                                    <td>{{ $showlistitem->car_registration_number}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Cancel Reason</th>    
                                                    <td>{{ $showlistitem->cancel_reason}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Booking Date</th>    
                                                    <td>{{ $showlistitem->booking_date}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Is Pre Booking</th>    
                                                    <td>{{ $showlistitem->is_pre_booking}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Type</th>    
                                                    <td>{{ $showlistitem->payment_type}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Is Paid</th>    
                                                    <td>{{ $showlistitem->is_paid}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>    
                                                    <td>{{ $showlistitem->status}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Car Category</th>    
                                                    <td>{{ $showlistitem->car_category}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Car Category</th>    
                                                    <td><img src="{{$showlistitem->car_category_icon}}" width='20%'></td>
                                                </tr>

                                                <tr>
                                                    <th>Base Fare</th>    
                                                    <td>{{ $showlistitem->base_fare}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Minimum Fare</th>    
                                                    <td>{{ $showlistitem->minimum_fare}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Per Min Fare</th>    
                                                    <td>{{ $showlistitem->per_min_fare}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Per KM Fare</th>    
                                                    <td>{{ $showlistitem->per_km_fare}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Per KM Fare Slab1</th>    
                                                    <td>{{ $showlistitem->per_km_fare_slab1}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Per KM Fare Slab2</th>    
                                                    <td>{{ $showlistitem->per_km_fare_slab2}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Per KM Fare Slab3</th>    
                                                    <td>{{ $showlistitem->per_km_fare_slab3}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Per KM Fare Slab4</th>    
                                                    <td>{{ $showlistitem->per_km_fare_slab4}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Per KM Fare Slab5</th>    
                                                    <td>{{ $showlistitem->per_km_fare_slab5}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Minimum Fare KM</th>    
                                                    <td>{{ $showlistitem->minimum_fare_km}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Toll Total</th>    
                                                    <td>{{ $showlistitem->toll_total}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Night Fare MultiPlier</th>    
                                                    <td>{{ $showlistitem->night_fare_multiplier}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Promo Code</th>    
                                                    <td>{{ $showlistitem->promo_code}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Promo Discount</th>    
                                                    <td>{{ $showlistitem->promo_discount}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Promo Discount Type</th>    
                                                    <td>{{ $showlistitem->promo_discount_type}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Promo Discount Value</th>    
                                                    <td>{{ $showlistitem->promo_discount_value}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Promo Max Discount</th>    
                                                    <td>{{ $showlistitem->promo_max_discount}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Portal Percentage</th>    
                                                    <td>{{ $showlistitem->portal_percentage}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Portal Earning</th>    
                                                    <td>{{ $showlistitem->portal_earning}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Driver Percentage</th>    
                                                    <td>{{ $showlistitem->driver_percentage}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Driver Earning</th>    
                                                    <td>{{ $showlistitem->driver_earning}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Driver Rating</th>    
                                                    <td>{{ $showlistitem->driver_rating}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Driver Review</th>    
                                                    <td>{{ $showlistitem->driver_review}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Customer Rating</th>    
                                                    <td>{{ $showlistitem->customer_rating}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Customer Review</th>    
                                                    <td>{{ $showlistitem->customer_review}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Is Customer Rated</th>    
                                                    <td>{{ $showlistitem->is_customer_rated}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Is driver Rated</th>    
                                                    <td>{{ $showlistitem->is_driver_rated}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Proxy Number</th>    
                                                    <td>{{ $showlistitem->proxy_number}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Proxy Service ID</th>    
                                                    <td>{{ $showlistitem->proxy_service_sid}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Proxy Session ID</th>    
                                                    <td>{{ $showlistitem->proxy_session_sid}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Capture charge ID</th>    
                                                    <td>{{ $showlistitem->capture_charge_id}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Capture Amount</th>    
                                                    <td>{{ $showlistitem->capture_amount}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Order ID</th>    
                                                    <td>{{ $showlistitem->order_id}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Tax Percentage</th>    
                                                    <td>{{ $showlistitem->tax_percentage}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Tax Value</th>    
                                                    <td>{{ $showlistitem->tax_value}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Created AT</th>    
                                                    <td>{{ $showlistitem->created_at}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Rider ID</th>    
                                                    <td>{{ $showlistitem->rider_id}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Driver ID</th>    
                                                    <td>{{ $showlistitem->driver_id}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Category ID</th>    
                                                    <td>{{ $showlistitem->category_id}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Promo ID</th>    
                                                    <td>{{ $showlistitem->promo_id}}</td>
                                                </tr>

                                                
                                               
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
