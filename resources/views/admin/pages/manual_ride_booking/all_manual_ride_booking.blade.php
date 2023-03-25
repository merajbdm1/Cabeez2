<style>
    .map-container {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    #map{
            width: 100%; height: 50vh; margin: 0; padding: 0;
            
        }
        #direction{
            color: #000;max-width: 99%;width:300px;position:absolute;z-index: 999;font-size: 15px;padding:10px;border: 1px solid #ddd;outline: none !important;top:55px;border-radius:10px;margin:2px 4px;}

</style>

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
                    <h1>Manual Rider Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Manual Rider Booking</li>
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
                    @endif @if ($message = Session::get('error_message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <!-- jquery validation -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Manual Rider Booking</small></h3>
                            <a type="button" href="{{ url('admin/view_menual_ride_booking') }}"
                                class="btn btn-default float-right bg-primary">
                                View All Rider Booking

                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/add_menual_ride') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-6"> --}}
{{-- 
                                        <div class="form-group">
                                            <label for="exampleLastName">Pickup Address<span
                                                    class="text-danger">*</span></label>                               
                                                <input  type="text" id="auto" name="auto" class="search-outer form-control as-input" placeholder="Search places or eLoc's..." required="" spellcheck="false" >
                                            @if($errors->has('pickup_address'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('pickup_address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleLastName">Destination Address<span
                                                    class="text-danger">*</span></label>
                                                    <input  type="text" id="auto2" name="auto2" class="search-outer form-control as-input" placeholder="Search places or eLoc's..." required="" spellcheck="false" >
                                        
                                                @if($errors->has('drop_off_address'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('drop_off_address') }}</strong>
                                                </span>
                                            @endif
                                        </div> --}}

                                    {{-- </div> --}}
                                  <div class="col-md-12 d-flex justify-content-center align-items-center">
                                    <div id="map"></div>
                                    <div id="direction"></div>
                                    <input type="text" name="pickup2" id="pickup">
                                    <input type="text"  name="drop2" id="drop">

                                </div>
                            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Pickup Date<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="start_date" class="form-control "
                                                value="{{ old('start_date') }}"
                                                id="exampleLastName" placeholder="Pickup Date Time">
                                            @if($errors->has('start_date'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleLastName">Pickup Time<span
                                                    class="text-danger">*</span></label>
                                            <input type="time" name="end_date" class="form-control "
                                                value="{{ old('end_date') }}" id="exampleLastName"
                                                placeholder="Pickup Date Time">
                                            @if($errors->has('end_date'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                


                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Ride ETA<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="ride_eta" class="form-control"
                                                value="{{ old('ride_eta') }}" id="exampleLastName"
                                                placeholder="Ride ETA">
                                            @if($errors->has('ride_eta'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('ride_eta') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Assign Driver<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="driver_id" class="form-control"
                                                value="{{ old('driver_id') }}"
                                                id="exampleLastName" placeholder="Assign Driver">
                                            @if($errors->has('driver_id'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('driver_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                 

                                   
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label for="exampleLastName">Vehicle Category<span
                                                    class="text-danger">*</span></label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">--Select Category--</option>
                                                @foreach ($all_vehicle_cat as $item)
                                                <option value="{{$item->_id}}">{{$item->name}}</option>
                                                @endforeach
                                              

                                            </select>
                                              @if($errors->has('vehiclec_category'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('vehiclec_category') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!--/.col (left) -->
                                <!-- right column -->
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Assign Driver</button>
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

@section('script')
<script>myGlobalVar = "";</script>
<script type="text/javascript">

    $(document).ready(function() {
            
   
         $.ajax({    //create an ajax request to display.php
           type: "get",
           url: "http://127.0.0.1:8000/admin/api",             
           dataType: "html", 
             //expect html to be returned                
           success: function(response){ 
            var data = JSON.parse(response);
            var all_data = data.access_token;
    
               myGlobalVar=all_data;
            //  var script = document.getElementById('myscript');
     
            // // Set the src attribute to the desired value
            //  script.setAttribute('src', 'https://apis.mapmyindia.com/advancedmaps/v1/'+myGlobalVar+'/map_load?v=1.5');

            // // Append the script element to the document body
            // document.body[0].appendChild(script);
              
           }
               
       });
   
   });
 
   
   </script>
   


<script id="myscript"  src=' '>
</script>   


<script src="https://apis.mapmyindia.com/advancedmaps/v1/c73ce2c2-f40e-4f6c-a0ba-450b1ab3a404/map_load?v=1.5"></script>
 <script src="https://apis.mapmyindia.com/advancedmaps/api/c73ce2c2-f40e-4f6c-a0ba-450b1ab3a404/map_sdk_plugins"></script>

{{--     
<script id="myscript" src="https://apis.mapmyindia.com/advancedmaps/v1/ded8df1c-477e-440f-b87e-2b51b19427bf/map_load?v=1.5">
</script>
<script id="sec2" src="https://apis.mapmyindia.com/advancedmaps/api/ded8df1c-477e-440f-b87e-2b51b19427bf/map_sdk_plugins"></script> --}}

    
<script>
      
    
    // /*Map Initialization*/
    //  var map = new MapmyIndia.Map('map', {center: [28.09, 78.3], zoom: 5, search: false,zoomControl: true, location: true, fullscreen: false, traffic: true});
     
    //  /*Search plugin initialization*/
    //    var optional_config={
    //     //    location:[28.61, 77.23],
    //     //    pod:'City',
    //     //    bridge:true,
    //     //    tokenizeAddress:true,
    //     //    filter:'cop:9QGXAM',
    //     //    distance:true,
    //     //    width:300,
    //     //    height:300,
    //    };
    //  var  dsd=   new MapmyIndia.search(document.getElementById("auto"),optional_config,callback);
    // //  console.longitude(dsd);
    //    new MapmyIndia.search(document.getElementById("auto2"),optional_config,callback);
       
    //    /*CALL for fix text - LIKE THIS
    //     * 
    //     new MapmyIndia.search("agra",optional_config,callback);
    //     * 
    //     * */

    //    var marker;
    //    function callback(data) { 
    //        if(data)
    //        {
    //            if(data.error)
    //            {
    //                if(data.error.indexOf('responsecode:401')!==-1){
    //                /*TOKEN EXPIRED, set new Token ie. 
    //                 * MapmyIndia.setToken(newToken);
    //                 */
    //                }
    //                console.warn(data.error);
                   
    //            }
    //            else
    //            {
    //                    var dt=data[0];
                       
                     
    //                    if(!dt) return false;
    //                    var eloc=dt.eLoc;
    //                    var lat=dt.latitude,lng=dt.longitude;
                       
    //                    var place=dt.placeName+(dt.placeAddress?", "+dt.placeAddress:"");
    //                    var place2=dt.placeName+(dt.placeAddress?", "+dt.placeAddress:"");

    //                    var auto2 = document.querySelector('#auto2').value;
    //                    var auto = document.querySelector('#auto').value;
    //                    $("#DrS_map").val(auto);
    //                    $("#DrE_map").val(auto2);
    //                    /*Use elocMarker Plugin to add marker*/
    //                    if(marker) marker.remove();
    //                    if(eloc) marker=new MapmyIndia.elocMarker({map:map,eloc:lat?lat+","+lng:eloc,popupHtml:place,popupOptions:{openPopup:true}}).fitbounds();
    //            }
    //        }
    //      }   
       
            
  </script>
  

<script>
    var map = new MapmyIndia.Map('map', {center: [28.09, 78.3], zoom: 5, search: false,zoomControl: true, location: true, fullscreen: false, traffic: true});
    var direction_option={
                map:map, // map object
                end:{label:'',geoposition:"1T182A"},
                Resource:'route_eta', // default route_adv
		        alongTheRoute:true, 
                callback:function(data) {
                console.log(data);
                var pickup = data['DrE_map'];
                var drop = data['DrS_map'];

                $("#pickup").val(pickup);
                $("#drop").val(drop);
                
            
         
             // {console.log(data);}
           
                /*start:"28.545,77.545",
                start_icon1:{url:'icon.png',width:50,height:40},
                end_icon:{url:'icon.png',width:20,height:40},
                via:"28.4554,77.323;123zrr",
                via:[{label:'mathura',geoposition:"28.544,77.4541"},{label:'Koshi',geoposition:"28.144,77.4541"}],
                via_icon:{url:'location.png',width:20,height:40, offset:[20,40]},
                divId:'direction',
                fitbounds:true // default true
                search:true,
                divWidth:300, //width of result div
                autoSubmit:true, //default true
                maxVia:2, // up to 98
                steps:false, //default true
                rType:true, // false*/
            }
            }
            MapmyIndia.direction(direction_option);
            
  </script>

  <script>
   $('#auto').on('keyup', function() {
    var auto = this.value;
    

//   alert( auto );
});


   
 $(document).ready(function() {
    $.ajax({
        type: "get",
        url: 'show3',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
       async: false,
        success: function (data) {
            console.log(data);
            console.log(data[0].category_id);
    
      }
    })
 });
  </script>



@endsection

  

