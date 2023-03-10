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
                        <h1>Role & Permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Role & Permission</li>
                          
                        </ol>
                            
                    </div>
                   
                </div>
                <div class="float-right">    <a type="button" href="{{ url('role_list_and_permission') }}" class="btn btn-default bg-primary">
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
                                                        <th>Role</th>
                                                        <td>{{ $viewAllRole->role_name }}</td>
                                                        
                                                    <th>Permission</th>
                                                    <td>
                                                       <label for="" class="badge badge-info">Driver </label> 
                                                        @foreach($viewAllRole->driver_permissions as $d_all_permission)
                                                        @if($d_all_permission == 'Delete')
                                                        <span class="badge badge-danger">

                                                            {{$d_all_permission}}
                                                            
                                                        </span>
                                                        @endif

                                                        @if($d_all_permission == 'Edit')
                                                        <span class="badge badge-success">

                                                            {{$d_all_permission}}
                                                            
                                                        </span>  
                                                        @endif  

                                                        @if($d_all_permission == 'Add')
                                                        <span class="badge badge-primary">

                                                            {{$d_all_permission}}
                                                            
                                                        </span>     
                                                        @endif   

                                                        @if($d_all_permission == 'View')
                                                        <span class="badge badge-info">

                                                            {{$d_all_permission}}
                                                            
                                                        </span>     
                                                        @endif                                          
                                                        @endforeach
                                                     
                                                        <br>
                                                        <label for="" class="badge badge-info">Rider </label> 
                                                         @foreach($viewAllRole->driver_permissions as $d_all_permission)
                                                         @if($d_all_permission == 'Delete')
                                                         <span class="badge badge-danger">
 
                                                             {{$d_all_permission}}
                                                             
                                                         </span>
                                                         @endif
 
                                                         @if($d_all_permission == 'Edit')
                                                         <span class="badge badge-success">
 
                                                             {{$d_all_permission}}
                                                             
                                                         </span>  
                                                         @endif  
 
                                                         @if($d_all_permission == 'Add')
                                                         <span class="badge badge-primary">
 
                                                             {{$d_all_permission}}
                                                             
                                                         </span>     
                                                         @endif   
 
                                                         @if($d_all_permission == 'View')
                                                         <span class="badge badge-info">
 
                                                             {{$d_all_permission}}
                                                             
                                                         </span>     
                                                         @endif                                          
                                                         @endforeach
                                                         

                                                         <br>
                                                         <label for="" class="badge badge-info">Rides </label> 
                                                          @foreach($viewAllRole->driver_permissions as $d_all_permission)
                                                          @if($d_all_permission == 'Delete')
                                                          <span class="badge badge-danger">
  
                                                              {{$d_all_permission}}
                                                              
                                                          </span>
                                                          @endif
  
                                                          @if($d_all_permission == 'Edit')
                                                          <span class="badge badge-success">
  
                                                              {{$d_all_permission}}
                                                              
                                                          </span>  
                                                          @endif  
  
                                                          @if($d_all_permission == 'Add')
                                                          <span class="badge badge-primary">
  
                                                              {{$d_all_permission}}
                                                              
                                                          </span>     
                                                          @endif   
  
                                                          @if($d_all_permission == 'View')
                                                          <span class="badge badge-info">
  
                                                              {{$d_all_permission}}
                                                              
                                                          </span>     
                                                          @endif                                          
                                                          @endforeach

                                                          <br>
                                                         <label for="" class="badge badge-info">Promocode </label> 
                                                          @foreach($viewAllRole->promocode_permissions as $promocode_permission)
                                                          @if($promocode_permission == 'Delete')
                                                          <span class="badge badge-danger">
  
                                                              {{$promocode_permission}}
                                                              
                                                          </span>
                                                          @endif
  
                                                          @if($promocode_permission == 'Edit')
                                                          <span class="badge badge-success">
  
                                                              {{$promocode_permission}}
                                                              
                                                          </span>  
                                                          @endif  
  
                                                          @if($promocode_permission == 'Add')
                                                          <span class="badge badge-primary">
  
                                                              {{$promocode_permission}}
                                                              
                                                          </span>     
                                                          @endif   
  
                                                          @if($promocode_permission == 'View')
                                                          <span class="badge badge-info">
  
                                                              {{$promocode_permission}}
                                                              
                                                          </span>     
                                                          @endif                                          
                                                          @endforeach

                                                          <br>
                                                         <label for="" class="badge badge-info">Promocode </label> 
                                                          @foreach($viewAllRole->reports_permissions as $reports_permissionspo)
                                                          @if($reports_permissionspo == 'Delete')
                                                          <span class="badge badge-danger">
  
                                                              {{$reports_permissionspo}}
                                                              
                                                          </span>
                                                          @endif
  
                                                          @if($reports_permissionspo == 'Edit')
                                                          <span class="badge badge-success">
  
                                                              {{$reports_permissionspo}}
                                                              
                                                          </span>  
                                                          @endif  
  
                                                          @if($reports_permissionspo == 'Add')
                                                          <span class="badge badge-primary">
  
                                                              {{$reports_permissionspo}}
                                                              
                                                          </span>     
                                                          @endif   
  
                                                          @if($reports_permissionspo == 'View')
                                                          <span class="badge badge-info">
  
                                                              {{$reports_permissionspo}}
                                                              
                                                          </span>     
                                                          @endif                                          
                                                          @endforeach


                                                          <br>
                                                          <label for="" class="badge badge-info">Manual Ride Booking </label> 
                                                           @foreach($viewAllRole->manual_ride_booking_permissions as $manual_ride_bookingpp_permissions)
                                                           @if($manual_ride_bookingpp_permissions == 'Delete')
                                                           <span class="badge badge-danger">
   
                                                               {{$manual_ride_bookingpp_permissions}}
                                                               
                                                           </span>
                                                           @endif
   
                                                           @if($manual_ride_bookingpp_permissions == 'Edit')
                                                           <span class="badge badge-success">
   
                                                               {{$manual_ride_bookingpp_permissions}}
                                                               
                                                           </span>  
                                                           @endif  
   
                                                           @if($manual_ride_bookingpp_permissions == 'Add')
                                                           <span class="badge badge-primary">
   
                                                               {{$manual_ride_bookingpp_permissions}}
                                                               
                                                           </span>     
                                                           @endif   
   
                                                           @if($manual_ride_bookingpp_permissions == 'View')
                                                           <span class="badge badge-info">
   
                                                               {{$manual_ride_bookingpp_permissions}}
                                                               
                                                           </span>     
                                                           @endif                                          
                                                           @endforeach


                                                           <br>
                                                          <label for="" class="badge badge-info">Rider Reviews </label> 
                                                           @foreach($viewAllRole->rider_reviews_permissions as $riderpp_reviews_permissions)
                                                           @if($riderpp_reviews_permissions == 'Delete')
                                                           <span class="badge badge-danger">
   
                                                               {{$riderpp_reviews_permissions}}
                                                               
                                                           </span>
                                                           @endif
   
                                                           @if($riderpp_reviews_permissions == 'Edit')
                                                           <span class="badge badge-success">
   
                                                               {{$riderpp_reviews_permissions}}
                                                               
                                                           </span>  
                                                           @endif  
   
                                                           @if($riderpp_reviews_permissions == 'Add')
                                                           <span class="badge badge-primary">
   
                                                               {{$riderpp_reviews_permissions}}
                                                               
                                                           </span>     
                                                           @endif   
   
                                                           @if($riderpp_reviews_permissions == 'View')
                                                           <span class="badge badge-info">
   
                                                               {{$riderpp_reviews_permissions}}
                                                               
                                                           </span>     
                                                           @endif                                          
                                                           @endforeach

                                                           <br>
                                                           <label for="" class="badge badge-info">Driver Reviews </label> 
                                                            @foreach($viewAllRole->driver_reviews_permissions as $driverpppp_reviews_permissions)
                                                            @if($driverpppp_reviews_permissions == 'Delete')
                                                            <span class="badge badge-danger">
    
                                                                {{$driverpppp_reviews_permissions}}
                                                                
                                                            </span>
                                                            @endif
    
                                                            @if($driverpppp_reviews_permissions == 'Edit')
                                                            <span class="badge badge-success">
    
                                                                {{$driverpppp_reviews_permissions}}
                                                                
                                                            </span>  
                                                            @endif  
    
                                                            @if($driverpppp_reviews_permissions == 'Add')
                                                            <span class="badge badge-primary">
    
                                                                {{$driverpppp_reviews_permissions}}
                                                                
                                                            </span>     
                                                            @endif   
    
                                                            @if($driverpppp_reviews_permissions == 'View')
                                                            <span class="badge badge-info">
    
                                                                {{$driverpppp_reviews_permissions}}
                                                                
                                                            </span>     
                                                            @endif                                          
                                                            @endforeach

                                                            <br>
                                                           <label for="" class="badge badge-info">Vehicle Categories </label> 
                                                            @foreach($viewAllRole->vehicle_categories_permissions as $vehiclepp_categories_permissions)
                                                            @if($vehiclepp_categories_permissions == 'Delete')
                                                            <span class="badge badge-danger">
    
                                                                {{$vehiclepp_categories_permissions}}
                                                                
                                                            </span>
                                                            @endif
    
                                                            @if($vehiclepp_categories_permissions == 'Edit')
                                                            <span class="badge badge-success">
    
                                                                {{$vehiclepp_categories_permissions}}
                                                                
                                                            </span>  
                                                            @endif  
    
                                                            @if($vehiclepp_categories_permissions == 'Add')
                                                            <span class="badge badge-primary">
    
                                                                {{$vehiclepp_categories_permissions}}
                                                                
                                                            </span>     
                                                            @endif   
    
                                                            @if($vehiclepp_categories_permissions == 'View')
                                                            <span class="badge badge-info">
    
                                                                {{$vehiclepp_categories_permissions}}
                                                                
                                                            </span>     
                                                            @endif                                          
                                                            @endforeach

                                                            <br>
                                                           <label for="" class="badge badge-info">vehicle Make </label> 
                                                            @foreach($viewAllRole->vehicle_make_permissions as $vehiclepp_make_permissions)
                                                            @if($vehiclepp_make_permissions == 'Delete')
                                                            <span class="badge badge-danger">
    
                                                                {{$vehiclepp_make_permissions}}
                                                                
                                                            </span>
                                                            @endif
    
                                                            @if($vehiclepp_make_permissions == 'Edit')
                                                            <span class="badge badge-success">
    
                                                                {{$vehiclepp_make_permissions}}
                                                                
                                                            </span>  
                                                            @endif  
    
                                                            @if($vehiclepp_make_permissions == 'Add')
                                                            <span class="badge badge-primary">
    
                                                                {{$vehiclepp_make_permissions}}
                                                                
                                                            </span>     
                                                            @endif   
    
                                                            @if($vehiclepp_make_permissions == 'View')
                                                            <span class="badge badge-info">
    
                                                                {{$vehiclepp_make_permissions}}
                                                                
                                                            </span>     
                                                            @endif                                          
                                                            @endforeach

                                                            <br>
                                                           <label for="" class="badge badge-info">Vehicle Model </label> 
                                                            @foreach($viewAllRole->vehicle_model_permissions as $vehiclepp_model_permissions)
                                                            @if($vehiclepp_model_permissions == 'Delete')
                                                            <span class="badge badge-danger">
    
                                                                {{$vehiclepp_model_permissions}}
                                                                
                                                            </span>
                                                            @endif
    
                                                            @if($vehiclepp_model_permissions == 'Edit')
                                                            <span class="badge badge-success">
    
                                                                {{$vehiclepp_model_permissions}}
                                                                
                                                            </span>  
                                                            @endif  
    
                                                            @if($vehiclepp_model_permissions == 'Add')
                                                            <span class="badge badge-primary">
    
                                                                {{$vehiclepp_model_permissions}}
                                                                
                                                            </span>     
                                                            @endif   
    
                                                            @if($vehiclepp_model_permissions == 'View')
                                                            <span class="badge badge-info">
    
                                                                {{$vehiclepp_model_permissions}}
                                                                
                                                            </span>     
                                                            @endif                                          
                                                            @endforeach
                                                     </td>
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
