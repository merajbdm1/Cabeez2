@extends('admin.layout.master')
@section('style')
@endsection
<style>
    /* th {
    background-color: #2f85db;
    color: #fff;
    padding: 0.5em 1em;
}

td {
    border-top: 1px solid #eee;
    padding: 0.5em 1em;
} */


[data-title]:hover:after {
    opacity: 1;
    transition: all 0.1s ease 0.5s;
    visibility: visible;
}

[data-title]:hover:before {
    opacity: 1;
    transition: all 0.1s ease 0.5s;
    visibility: visible;
}
[data-title]:before{
    content: '\25B2';
    /* background-color:#222222; */
    color:#222222;
    position: absolute;
    z-index: 99999;
    left: 30%;
    bottom:-1em;
    opacity: 0;
}
[data-title]:after {
    content: attr(data-title);
    background-color: #222222;
    color: #fff;
    font-size: 110%;
    position: absolute;
    padding: 1px 5px 2px 5px;
    bottom: -2.1em;
    left: -100%;
    font-weight: 600;
    white-space: nowrap;
    box-shadow: 1px 1px 3px #222222;
    opacity: 0;
    z-index: 99999;
}
[data-title] {
    position: relative;
}


.zoom {
  padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;
}
.zoom1 {
    padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;

}    

.zoom2 {
    padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;

} 

.zoom3 {
    padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;

} 

.zoom4 {
    padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;

} 

.zoom5 {
    padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;

} 

.zoom6 {
    padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;

} 

.zoom7 {
    padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;

} 
.zoom8 {
    padding: 50px;
  background-color: white;
  transition: transform .2s;
  width: 100%;
  height: 100%;
  margin: 0 auto;

} 
.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.zoom1:hover {
    -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}

.zoom2:hover {
    -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.zoom3:hover {
    -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.zoom4:hover {
    -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.zoom5:hover {
    -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.zoom6:hover {
    -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.zoom7:hover {
    -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.zoom8:hover {
    -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
</style>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    {{-- <div class="col-sm-6">
                    </div> --}}

                    {{-- <div class="content-page"> --}}
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-block card-stretch">
                                        <div class="card-body p-0">
                                            <div class="d-flex justify-content-between align-items-center p-3">
                                                <div class="d-flex">
                                                   
                                                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                                      <li class="nav-item">
                                                        <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Profile</a>
                                                      </li>
                                                      <li class="nav-item">
                                                        <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Ride History</a>
                                                      </li>
                                                      <li class="nav-item">
                                                        <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Attendance</a>
                                                      </li>
                                                     
                                                    </ul>
                                                  
                                                    
                                               {{-- <a class="btn btn-primary" href=" ">View</a> --}}
                                               <div class="">
                                             


                                                </div>
                                                
                                                </div>
                                                
                                                <div class="">
                                                    <a href="{{ url('admin/driver') }}"
                                                    class="float-right btn btn-sm btn-primary"><i
                                                        class="fa fa-angle-double-left"></i>Back</a>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-content" id="custom-content-above-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                                    <div class="row">

                                    <div class="col-lg-4">
                                        <div class="card card-block p-card">
                                            <div class="">
                                                <div class="profile-card rounded">
                                                    <img src="{{ asset('admin/uploads/Driver/' . $preview_driver->photo) }}"
                                                        alt="Driver"
                                                        class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="250px" height="150px">
    
    
                                                </div>
                                                <div class="pro-content rounded">
    
    
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="p-icon mr-3">
    
                                                        </div>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  


                                         {{-- @php  
                                        
                                         $a=array();
                                        if(isset($preview_driver)){

                                       foreach($preview_driver->mondaystartend as $item){          
                                       }
                                 
                                       extract($a, EXTR_PREFIX_ALL, "variable");
                                       $title1 = $variable_0.' - '.$variable_1;
                                    }
                                       @endphp        
                                      
                                        @php  
                                        $a=array();
                                       foreach($preview_driver->tuesdaystartend as $item){  
                                                array_push($a,$item);
                                       }
                                       extract($a, EXTR_PREFIX_ALL, "variable");
                                       $title1 = $variable_0.' - '.$variable_1;
                                       @endphp
    
                                        @php  
                                        $a=array();
                                        foreach($preview_driver->wednesdaystartend as $item){  
                                                array_push($a,$item);
                                        }
                                        extract($a, EXTR_PREFIX_ALL, "variable");
                                        $title2 = $variable_0.' - '.$variable_1;
                                        @endphp
                                        
    
                                        @php  
                                        $a=array();
                                        foreach($preview_driver->thursdaystartend as $item){  
                                                array_push($a,$item);
                                        }
                                        extract($a, EXTR_PREFIX_ALL, "variable");
                                        $title3 = $variable_0.' - '.$variable_1;
                                        @endphp
    
                                        @php  
                                        $a=array();
                                        foreach($preview_driver->fridaystartend as $item){  
                                                array_push($a,$item);
                                        }
                                        extract($a, EXTR_PREFIX_ALL, "variable");
                                        $title4 = $variable_0.' - '.$variable_1;
                                        @endphp
    
                                        @php  
                                        $a=array();
                                        foreach($preview_driver->saturdaystartend as $item){  
                                                array_push($a,$item);
                                        }
                                        extract($a, EXTR_PREFIX_ALL, "variable");
                                        $title5 = $variable_0.' - '.$variable_1;
                                        @endphp --}}
                                    
    
                                        <div class="card card-block">
                                            <div class="card-header d-flex justify-content-between">
                                                <table id="attendence-table">
                                                    
                                                    <tbody>
                                                
                                                      <tr>
                                                        <th class="name-col">Working Days</th>
                                                        <th type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"   data-title="Holiday">S</th>
                                                        <th type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"  data-title="{{$preview_driver->mondaystartend}}">M</th>
                                                        <th type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"  data-title="{{$preview_driver->tuesdaystartend}}">T</th>
                                                        <th type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"  data-title="{{$preview_driver->wednesdaystartend}}">W</th>
                                                        <th type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"  data-title="{{$preview_driver->thursdaystartend}}">T</th>
                                                        <th type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"  data-title="{{$preview_driver->fridaystartend}}">F</th>
                                                        <th type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"  data-title="{{$preview_driver->saturdaystartend}}">S</th>
                                                       
                                                       
                                                      </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card card-block">
                                            <div class="card-header d-flex justify-content-between">
                                                <div class="header-title">
                                                    <h4 class="card-title mb-0"> <b>Driver Detail</b></h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
    
                                                    <div class="col-9">
                                                        <th><b>Driver DOB :-</b></th>
                                                        <td>{{ $preview_driver->date_of_birth }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>PUC Expiry Date :-</b></th>
                                                        <td>{{ $preview_driver->driver_puc_expiry_date }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b> Driver Blood Group :-</b></th>
                                                        <td>{{ $preview_driver->blood_group }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>Emergency Number :-</b></th>
                                                        <td>{{ $preview_driver->driver_emergency_number }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>State :-</b></th>
                                                        <td>{{ $preview_driver->state }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>City :-</b></th>
                                                        <td>{{ $preview_driver->city }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>Postal code :-</b></th>
                                                        <td>{{ $preview_driver->postal_code }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>Address :-</b></th>
                                                        <td>{{ $preview_driver->address }}</td>
    
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
    
    
    
    
                                        <div class="card card-block">
                                            <div class="card-header d-flex justify-content-between">
                                                <div class="header-title">
                                                    <h4 class="card-title mb-0"> <b>Rider Type</b></h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
    
                                                    <div class="col-9">
                                                        
                                                        <td>{{ $preview_driver->driver_ride_type }}</td>
    
                                                    </div>
                                                   
                                                    
                                                </div>
                                            </div>
    
    
                                        </div>
    
                                        <div class="card card-block">
                                            <div class="card-header d-flex justify-content-between">
                                                <div class="header-title">
                                                    <h4 class="card-title mb-0"> <b>Vehicle Detail</b></h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
    
                                                    <div class="col-9">
                                                        <th><b>Vehicle Year :-</b></th>
                                                        <td>{{ $preview_driver->vehicle_year }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>Registration Number :-</b></th>
                                                        <td>{{ $preview_driver->driver_vehicle_registration_number }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b> Make :-</b></th>
                                                        <td>{{ $preview_driver->driver_vehicle_make }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>Vehicle Model :-</b></th>
                                                        <td>{{ $preview_driver->driver_vehicle_model }}</td>
    
                                                    </div>
                                                    <div class="col-9">
                                                        <th><b>Vehicle Category :-</b></th>
                                                        <td>{{ $preview_driver->driver_vehicle_category }}</td>
    
                                                    </div>
    
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-8">
    
                                        <div class="row">
                                             
                                            <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Commercial Insurance</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img class="zoom" src="{{ asset('admin/uploads/Driver/' . $preview_driver->commercial_insurance) }}"
                                                            alt="Driver"
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Driver License Front</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img class="zoom1" src="{{ asset('admin/uploads/Driver/' . $preview_driver->license_photo_front) }}"
                                                            alt="Driver"
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Driver License Back</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img class="zoom2" src="{{ asset('admin/uploads/Driver/' . $preview_driver->license_photo_back) }}"
                                                            alt="Driver"
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Driver Aadhaar Front</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img class="zoom3" src="{{ asset('admin/uploads/Driver/' . $preview_driver->aadhaar_image_front) }}"
                                                            alt="Driver"
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                              <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Driver Aadhaar Back</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img class="zoom4" src="{{ asset('admin/uploads/Driver/' . $preview_driver->aadhaar_image_back) }}"
                                                            alt="Driver"
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Driver Rental Agreement Front</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img class="zoom5" src="{{ asset('admin/uploads/Driver/' . $preview_driver->rental_agreement_front) }}"
                                                            alt="Driver Rental Agreement"
    
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Driver Rental Agreement Back</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img  class="zoom6" src="{{ asset('admin/uploads/Driver/' . $preview_driver->rental_agreement_back) }}"
                                                            alt="Driver Rental Agreement"
    
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
    
                                            <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Driver Pan Card</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img class="zoom7" src="{{ asset('admin/uploads/Driver/' . $preview_driver->pan_card) }}"
                                                            alt="Driver Rental Agreement"
    
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            
                                            <div class="col-md-4"> 
                                                <h5 class="text-center my-3">Vehicle Registration Image</h5>
                                                <div class="card card-block">
                                                      
                                                    <div class="card-body">
                                                       
                                                        <div class="top-block-one">
                                                           
                                                            <img class="zoom8" src="{{ asset('admin/uploads/Driver/' . $preview_driver->registration_photo) }}"
                                                            alt="Driver Rental Agreement"
    
                                                            class="avatar-100 rounded d-block mx-auto img-fluid mb-2" width="200%">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>

                                
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                                    <div class="row"> 

                                        <div class="card-body">
                                            <table class="table table-bordered table-striped" id="example1">
                                                <thead>
                                                    <tr>
                                                        <tr>
                                                            <th>SERIAL NO</th>
                                                            <th>RIDER ID</th>
                                                            <th>RIDER NUMBER</th>
                                                            <th>CATEGAORY</th>
                                                            <th>PAYMENT TYPE</th>
                                                            <th>BOOKING DATE & TIME</th>
                                                            <th>RIDER ID</th>
                                                            <th>DRIVER ID</th>
                                                            <th>RIDE FARE</th>
                                                            <th>TOLL TAXES</th>
                                                            <th>RIDE TYPE</th>
                                                            <th>RIDE STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>
        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  
                                                </tbody>
        
                                            </table>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
                                    <div class="row">
                                        
                                                                <div class="col-lg-12">
                                                                    <div class="card card-block card-stretch">
                                                                        <div class="card-body p-0">
                                                                            <div class="d-flex justify-content-between align-items-center p-3">
                                
                                                                                <div class="page-wrapper">
                                                                                    <div class="content container-fluid">
                                
                                                                                        <!-- Page Header -->
                                                                                        <div class="page-header">
                                                                                            <div class="row">
                                
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- /Page Header -->
                                
                                                                                        <!-- Search Filter -->
                                
                                                                                        <form action="" method="GET">
                                                                                        <div class="row filter-row">
                                                                                            <div class="col-sm-6 col-md-3">
                                                                                                <div class="form-group form-focus">
                                                                                                    <input type="text" placeholder="Search Driver Name"
                                                                                                        class="form-control floating">
                                                                                                    <br>
                                                                                                   
                                                                                                    <span class="btn btn-secondary"><i class="fa fa-calendar" aria-hidden="true"> &nbsp;<?php date_default_timezone_set("Asia/Kolkata");
                                                                                                        $today = date("Y");
                                                                                                        echo $today;?></i></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-6 col-md-3">
                                                                                                <div class="form-group form-focus select-focus">
                                                                                                    <select id="select" class="select floating form-control" >
                                                                                                        <option>-Select Month-</option>
                                                                                                        <option value="January">January</option>
                                                                                                        <option value="February">February</option>
                                                                                                        <option value="February">March</option>
                                                                                                        <option value="February">April</option>
                                                                                                        <option value="February">May</option>
                                                                                                        <option value="February">June</option>
                                                                                                        <option value="February">July</option>
                                                                                                        <option value="February">August</option>
                                                                                                        <option value="February">September</option>
                                                                                                        <option value="February">October</option>
                                                                                                        <option value="February">November</option>
                                                                                                        <option value="February">December</option>
                                                                                                    </select>
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-6 col-md-3">
                                                                                                <div class="form-group form-focus select-focus">
                                                                                                    <select class="select floating form-control" id="year" class="">
                                                                                                        <option>-Select Year-</option>
                                                                                                       <?php  
                                
                                                                                                         $cur_year = date('1990');
                                                                                                            for ($i=0; $i<=60; $i++) { ?>
                                                                                                            
                                                                                                       <option><?php echo $cur_year++; ?></option>
                                                                                                          <?php }?>
                                
                                                                                                        
                                                                                                    </select>
                                                                                                   
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-3">
                                                                                                <a  href="" class="btn btn-primary" value="submit"> Search
                                                                                                </a> <a  href="" class="btn btn-danger" value="submit"> Clear
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        </form>
                                                                                        <!-- /Search Filter -->
                                                                               
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12">
                                                                                                <div class="table-responsive">
                                                                                                    <table class="table table-bordered table-striped">
                                                                                                        <?php 
                                                                                                        // $list=array();
                                                                                                        //     $month = 6;
                                                                                                        //     $year = 2004;
                                
                                                                                                        //     for($d=1; $d<=31; $d++)
                                                                                                        //     {
                                                                                                        //         $time=mktime(12, 0, 0, $month, $d, $year);          
                                                                                                        //         if (date('m', $time)==$month)       
                                                                                                        //             $list[]=date('Y-m-d-D', $time);
                                                                                                        //     }
                                                                                                        //     echo "<pre>";
                                                                                                        //     print_r($list);
                                                                                                        //     echo "</pre>";
                                                                                                            ?>
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th>Month</th>
                                                                                                                <?php $list=array();
                                                                                                                  $month = date('m');
                                                                                                                  $year = date('y');
                                
                                                                                                                  for($d=1; $d<=31; $d++)
                                                                                                                  {
                                                                                                                      $time=mktime(12, 0, 0, $month, $d, $year);          
                                                                                                                      if (date('m', $time)==$month)       
                                                                                                                          $list[]=date('d', $time);
                                                                                                                  }
                                
                                                                                                                  foreach ($list as $lis){
                                                                                                                      echo '<th>'.$lis.'</th>';
                                                                                                                          } 
                                                                                                                          ?>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                
                                
                                                                                                                    <p><?php date_default_timezone_set("Asia/Kolkata");
                                                                                                                        $today = date("F");
                                                                                                                        echo $today;?></p>
                                
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                
                                
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                
                                
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                   <td><a href="javascript:void(0);" data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                   <td><a href="javascript:void(0);" data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#attendance_info"><i
                                                                                                                            class="fa fa-check text-success"></i></a>
                                                                                                                </td>
                                                                                                                <td><a href="javascript:void(0);" data-toggle="modal"
                                                                                                                    data-target="#attendance_info"><i
                                                                                                                        class="fa fa-check text-success"></i></a>
                                                                                                              </td>
                                                                                                                </td>
                                                                                                               
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    {{-- <div class="row">
                                                                                       <div class="col-lg-12">
                                                                                        <div class="calendar">
                                                                                            <h1>
                                                                                              <button class="prev btn">&lt;</button>
                                                                                              <span class="month-year"></span>
                                                                                              <button class="next btn">&gt;</button>
                                                                                            </h1>
                                                                                            <ul class="weekdays"></ul>
                                                                                            <ul class="days"></ul>
                                                                                          </div>
                                                                                          <footer></footer>
                                                                                       </div>
                                                                                    </div> --}}
                                                                                    <!-- /Page Content -->
                                
                                                                                    <!-- Attendance Modal -->
                                                                                    <div class="modal custom-modal fade" id="attendance_info"
                                                                                        role="dialog">
                                                                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                                            role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title">Attendance Info</h5>
                                                                                                    <button type="button" class="close"
                                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-6">
                                                                                                            <div class="card Log-status">
                                                                                                                <div class="card-body">
                                                                                                                    <h5 class="card-title">Timesheet <small
                                                                                                                            class="text-muted">11 Mar
                                                                                                                            2019</small>
                                                                                                                    </h5>
                                                                                                                    <div class="Log-det">
                                                                                                                        <h6>Log In at</h6>
                                                                                                                        <p>Wed, 11th Mar 2019 10.00 AM</p>
                                                                                                                    </div>
                                                                                                                    <div class="Log-info">
                                                                                                                        <div class="Log-hours">
                                                                                                                            <span>3.45 hrs</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="Log-det">
                                                                                                                        <h6>Log Out at</h6>
                                                                                                                        <p>Wed, 20th Feb 2019 9.00 PM</p>
                                                                                                                    </div>
                                                                                                                    <div class="statistics">
                                                                                                                        <div class="row">
                                                                                                                            <div
                                                                                                                                class="col-md-6 col-6 text-center">
                                                                                                                                <div class="stats-box">
                                                                                                                                    <p>Break</p>
                                                                                                                                    <h6>1.21 hrs</h6>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-md-6 col-6 text-center">
                                                                                                                                <div class="stats-box">
                                                                                                                                    <p>Overtime</p>
                                                                                                                                    <h6>3 hrs</h6>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                            <div class="card recent-activity">
                                                                                                                <div class="card-body d-flex">
                                                                                                                    <h5 class="card-title">Activity</h5>
                                                                                                                    <ul class="res-activity-list">
                                                                                                                        <li>
                                                                                                                            <p class="mb-0">Log In at
                                                                                                                            </p>
                                                                                                                            <p class="res-activity-time">
                                                                                                                                <i
                                                                                                                                    class="fa fa-clock-o"></i>
                                                                                                                                10.00 AM.
                                                                                                                            </p>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <p class="mb-0">Log Out at
                                                                                                                            </p>
                                                                                                                            <p class="res-activity-time">
                                                                                                                                <i
                                                                                                                                    class="fa fa-clock-o"></i>
                                                                                                                                11.00 AM.
                                                                                                                            </p>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <p class="mb-0">Log In at
                                                                                                                            </p>
                                                                                                                            <p class="res-activity-time">
                                                                                                                                <i
                                                                                                                                    class="fa fa-clock-o"></i>
                                                                                                                                11.15 AM.
                                                                                                                            </p>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <p class="mb-0">Log Out at
                                                                                                                            </p>
                                                                                                                            <p class="res-activity-time">
                                                                                                                                <i
                                                                                                                                    class="fa fa-clock-o"></i>
                                                                                                                                1.30 PM.
                                                                                                                            </p>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <p class="mb-0">Log In at
                                                                                                                            </p>
                                                                                                                            <p class="res-activity-time">
                                                                                                                                <i
                                                                                                                                    class="fa fa-clock-o"></i>
                                                                                                                                2.00 PM.
                                                                                                                            </p>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <p class="mb-0">Log Out at
                                                                                                                            </p>
                                                                                                                            <p class="res-activity-time">
                                                                                                                                <i
                                                                                                                                    class="fa fa-clock-o"></i>
                                                                                                                                7.30 PM.
                                                                                                                            </p>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /Attendance Modal -->
                                
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>
    @endsection
