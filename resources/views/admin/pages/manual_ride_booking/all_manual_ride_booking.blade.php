<style>
    .map-container{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
  }
  .map-container iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
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
                    @endif @if ($message = Session::get('fail_message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <!-- jquery validation -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Manual Rider Booking</small></h3>
                            <a type="button" href="{{ url('view_all_manual_rider_booking') }}" class="btn btn-default float-right bg-primary">
                                View All Rider Booking 

                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form  action="{{ url('fare_process') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFirstName">Rider Contact No <span class="text-danger">*</span></label>
                                            <input type="text" name="ride_contact_no" class="form-control" value="{{ old('ride_contact_no') }}" id="exampleFirstName" placeholder="Rider Contact No">
                                            @if ($errors->has('ride_contact_no'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('ride_contact_no') }}</strong>
                                                        </span>
                                                    @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleLastName">Rider Name <span class="text-danger">*</span></label>
                                            <input type="number" name="ride_name" class="form-control" value="{{ old('ride_name') }}" id="exampleLastName" placeholder="Rider Name">
                                            @if ($errors->has('ride_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('ride_name') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleLastName">Rider Email<span class="text-danger">*</span></label>
                                            <input type="email" name="rider_email" class="form-control" value="{{ old('rider_email') }}" id="exampleLastName" placeholder="Rider Email">
                                            @if ($errors->has('rider_email'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('rider_email') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleLastName">Ride Estimate <span class="text-danger">*</span></label>
                                            <input type="text" name="ride_estimate" class="form-control" value="{{ old('ride_estimate') }}" id="exampleLastName" placeholder="Ride Estimate">
                                            @if ($errors->has('ride_estimate'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('ride_estimate') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleLastName">Pickup Address<span class="text-danger">*</span></label>
                                            <input type="text"  id="origin-input" name="pickup_address" class="form-control controls" value="{{ old('pickup_address') }}" id="exampleLastName" placeholder="Pickup Address">
                                            @if ($errors->has('pickup_address'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('pickup_address') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleLastName">Destination Address<span class="text-danger">*</span></label>
                                            <input type="text" id="destination-input" name="destination_address" class="form-control controls" value="{{ old('destination_address') }}" id="exampleLastName" placeholder="Destination Address">
                                            @if ($errors->has('destination_address'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('destination_address') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>
                                    {{-- <div id="map"></div> --}}

                                    <div class="col-md-6 d-flex justify-content-center align-items-center" >
                                        <div class="form-group" id="map-container-google-1" class="z-depth-1-half map-container">
                                        <iframe src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&libraries=places&v=weekly" 
                                            width="500"
                                             height="450"
                                              style="border:1px solid;"></iframe>
                                      </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Pickup Date Time<span class="text-danger">*</span></label>
                                            <input type="text" name="pickup_date_time" class="form-control " value="{{ old('pickup_date_time') }}" id="exampleLastName" placeholder="Pickup Date Time">
                                            @if ($errors->has('pickup_date_time'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('pickup_date_time') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Ride ETA<span class="text-danger">*</span></label>
                                            <input type="text" disabled name="ride_eta" class="form-control" value="{{ old('ride_eta') }}" id="exampleLastName" placeholder="Ride ETA">
                                            @if ($errors->has('ride_eta'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('ride_eta') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Assign Driver<span class="text-danger">*</span></label>
                                            <input type="text" name="assign_driver" class="form-control" value="{{ old('assign_driver') }}" id="exampleLastName" placeholder="Assign Driver">
                                            @if ($errors->has('assign_driver'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('assign_driver') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Estimate Fare Total<span class="text-danger">*</span></label>
                                            <input type="text" disabled name="estimate_fare_total" class="form-control" value="{{ old('estimate_fare_total') }}" id="exampleLastName" placeholder="Estimate Fare Total">
                                            @if ($errors->has('estimate_fare_total'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('estimate_fare_total') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                       
                                    </div>
                                    
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleLastName">Tax <span class="text-danger">*</span></label>
                                            <input type="text" disabled name="tax" class="form-control" value="{{ old('tax') }}" id="exampleLastName" placeholder="Tax">
                                            @if ($errors->has('tax'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('tax') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleLastName">Total Amount <span class="text-danger">*</span></label>
                                            <input type="number" disabled name="total_amount" class="form-control" value="{{ old('total_amount') }}" id="exampleLastName" placeholder="Total Amount">
                                            @if ($errors->has('total_amount'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('total_amount') }}</strong>
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

<script type="text/javascript">
    // This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
const map = new google.maps.Map(document.getElementById("map"), {
  mapTypeControl: false,
  center: { lat: -33.8688, lng: 151.2195 },
  zoom: 13,
});

new AutocompleteDirectionsHandler(map);
}

class AutocompleteDirectionsHandler {
map;
originPlaceId;
destinationPlaceId;
travelMode;
directionsService;
directionsRenderer;
constructor(map) {
  this.map = map;
  this.originPlaceId = "";
  this.destinationPlaceId = "";
  this.travelMode = google.maps.TravelMode.WALKING;
  this.directionsService = new google.maps.DirectionsService();
  this.directionsRenderer = new google.maps.DirectionsRenderer();
  this.directionsRenderer.setMap(map);

  const originInput = document.getElementById("origin-input");
  const destinationInput = document.getElementById("destination-input");
  const modeSelector = document.getElementById("mode-selector");
  // Specify just the place data fields that you need.
  const originAutocomplete = new google.maps.places.Autocomplete(
    originInput,
    { fields: ["place_id"] }
  );
  // Specify just the place data fields that you need.
  const destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput,
    { fields: ["place_id"] }
  );

  this.setupClickListener(
    "changemode-walking",
    google.maps.TravelMode.WALKING
  );
  this.setupClickListener(
    "changemode-transit",
    google.maps.TravelMode.TRANSIT
  );
  this.setupClickListener(
    "changemode-driving",
    google.maps.TravelMode.DRIVING
  );
  this.setupPlaceChangedListener(originAutocomplete, "ORIG");
  this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
    destinationInput
  );
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}
// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
setupClickListener(id, mode) {
  const radioButton = document.getElementById(id);

  radioButton.addEventListener("click", () => {
    this.travelMode = mode;
    this.route();
  });
}
setupPlaceChangedListener(autocomplete, mode) {
  autocomplete.bindTo("bounds", this.map);
  autocomplete.addListener("place_changed", () => {
    const place = autocomplete.getPlace();

    if (!place.place_id) {
      window.alert("Please select an option from the dropdown list.");
      return;
    }

    if (mode === "ORIG") {
      this.originPlaceId = place.place_id;
    } else {
      this.destinationPlaceId = place.place_id;
    }

    this.route();
  });
}
route() {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }

  const me = this;

  this.directionsService.route(
    {
      origin: { placeId: this.originPlaceId },
      destination: { placeId: this.destinationPlaceId },
      travelMode: this.travelMode,
    },
    (response, status) => {
      if (status === "OK") {
        me.directionsRenderer.setDirections(response);
      } else {
        window.alert("Directions request failed due to " + status);
      }
    }
  );
}
}

window.initMap = initMap;
  

</script>




