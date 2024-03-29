<style>
    .map-container {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    #map {
        width: 100%;
        height: 50vh;
        margin: 0;
        padding: 0;

    }

    #direction {
        color: #000;
        max-width: 99%;
        width: 300px;
        position: absolute;
        z-index: 999;
        font-size: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        outline: none !important;
        top: 55px;
        border-radius: 10px;
        margin: 2px 4px;
    }

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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Hubs</h3>
                                <a type="button" href="{{ url('add_hub') }}"
                                    class="btn btn-default float-right bg-primary">
                                    Add Hub
                                </a>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>start_date*</th>
                                            <th>end_date*</th>
                                            <th>pickup2*</th>

                                            <th>drop2*</th>
                                            <th>Assign Driver*</th>
                                           
                                            <th>Vehicle Category*</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dff as $item)
                                        <tr>
                                            
                                                
                                            <td>1   </td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                            <td>{{ $item->pickup2 }}</td>

                                            <td>{{ $item->drop2 }}</td>
                                            
                                            <td>{{ isset($item->driver->first_name)?$item->driver->first_name:'Not Available' }}</td>
                                            <td>{{ isset($item->categories->name)?$item->categories->name:'Not Available' }}</td>
                                         
                                            <td><a href="{{ url ('admin/edit_menual_ride_booking')}}/{{ $item->_id}}">Edit</a></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
</div>
@endsection

@section('script')
<script>
    myGlobalVar = "";

</script>
<script type="text/javascript">
    $(document).ready(function () {


        $.ajax({ //create an ajax request to display.php
            type: "get",
            url: "http://127.0.0.1:8000/admin/api",
            dataType: "html", //expect html to be returned                
            success: function (response) {
                var data = JSON.parse(response);
                var all_data = data.access_token;

                myGlobalVar = all_data;
                //   var script = document.getElementById('myscript');

                // // Set the src attribute to the desired value
                //  script.setAttribute('src', 'https://apis.mapmyindia.com/advancedmaps/v1/'+myGlobalVar+'/map_load?v=1.5');

                // // Append the script element to the document body
                // document.body[0].appendChild(script);

            }

        });

    });

</script>



<script id="myscript" src=' '>
</script>


<script src="https://apis.mapmyindia.com/advancedmaps/v1/81d8d9c1-9b62-46c9-997f-25f5fec9c5f0/map_load?v=1.5"></script>
<script src="https://apis.mapmyindia.com/advancedmaps/api/81d8d9c1-9b62-46c9-997f-25f5fec9c5f0/map_sdk_plugins">
</script>

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
    var map = new MapmyIndia.Map('map', {
        center: [28.09, 78.3],
        zoom: 5,
        search: false,
        zoomControl: true,
        location: true,
        fullscreen: false,
        traffic: true
    });
    var direction_option = {
        map: map, // map object
        start: {
            label: '',
            geoposition: ""
        },
        end: {
            label: '',
            geoposition: ""
        },
        Resource: 'route_eta', // default route_adv
        alongTheRoute: true,
        callback: function (data) {
            console.log(data);
            var pickup = data['DrE_map'];
            var drop = data['DrS_map'];

            $("#pickup").val(pickup);
            $("#drop").val(drop);

        }
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
    MapmyIndia.direction(direction_option);

</script>

<script>
    $('#auto').on('keyup', function () {
        var auto = this.value;


        //   alert( auto );
    });

</script>



@endsection
