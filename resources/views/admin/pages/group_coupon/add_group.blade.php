@extends('admin.layout.master')
@section('style')

<style>
    .rider_data {
        background: #fff;
        height: 350px;
        overflow-x: hidden;
        border: 1px solid rgb(177, 164, 214) !important;
    }

    .rider_dataclass {
        background: #fff;
        height: 350px;
        overflow-x: hidden;
        border: 1px solid rgb(177, 164, 214) !important;
    }
</style>
<style>
    .fixedsearch {

        padding: 0 0 0 0;
        margin: 0 auto;
        position: fixed;
        min-width: 100%;
        height: 90px;
        display: table;
    }

    .fixedsearch{
        text-align: center;
        /* 	font-size: 4vw; */
        font-weight: bold;
        display: table-cell;
        vertical-align: middle;
    }
</style>

@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Make Group Promocode</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Make Group Promocode</li>
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
                                    <h3 class="card-title">Add Group</small></h3>
                                    <a type="button" href="{{ url('view_group_promocode') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Back

                                    </a>
                                </div>


                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="quickForm" action="{{ url('post_make_group') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">Group Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="group_name"
                                                        class="form-control{{ $errors->has('group_name') ? ' is-invalid' : '' }}"
                                                        id="exampleFirstName" placeholder="Group Name"
                                                        value="{{ old('group_name') }}">
                                                    @if ($errors->has('group_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('group_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFirstName">Coupon<span
                                                            class="text-danger">*</span></label>
                                                        <select name="promocode_id" id="" class="form-control">
                                                            <option value="">--Select Coupon--</option>
                                                            @foreach ($viewpromo as $item)
                                                             <option value="{{$item->_id}}">{{$item->title}}</option>
                                                            @endforeach

                                                        </select>
                                                </div>


                                                {{-- <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group" style="margin-bottom: 0px;">
                                                    <label for="exampleFirstName">Rider List<span>

                                                </div> --}}

                                                {{-- <div class="rider_data" class="fixedsearch" >
                                                    <div class="card-body">
                                                        <table class="table table-bordered table-striped" id="example3">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" data-sortable="true">NO</th>
                                                                    <th class="text-center" data-sortable="true">FIRST NAME</th>
                                                                    <th class="text-center" data-sortable="true">LAST NAME</th>
                                                                    <th class="text-center" data-sortable="true">MOBILE NO</th>
                                                                    <th class="text-center" data-sortable="true">Select Rider</th>
                                                                </tr>
                                                            </thead>
                                                            @php
                                                                $i=1;
                                                            @endphp
                                                            <tbody id="searchResults">
                                                                @foreach ($viewrider as $key=>$driver_model)
                                                            <tr>
                                                                <td class="text-center">{{ $i++;}}</td>
                                                                <td class="text-center">{{ $driver_model->first_name }}</td>
                                                                <td class="text-center">{{ $driver_model->last_name }}</td>
                                                                <td class="text-center">{{ $driver_model->phone_number }}</td>

                                                                    {{-- <input type="checkbox" class="checkbox" name="test" value="{{$driver_model->_id}}"/> --}}
                                                                    {{-- <td><a type="checkbox" class="form-control"style="height:20px;" name="rider_mobile[]" value="{{$driver_model->phone_number}}" /></a> --}}

                                                                    {{-- onchange="chkbox(this)" --}}
                                                            {{-- </tr>
                                                             @endforeach
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                    </div>
                                                </div> --}}

                                                {{-- </div> --}}

                                                {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFirstName">Selected Rider<span class="text-danger">*</span></label>
                                                       <div class="rider_dataclass" >
                                                        <ul class="list-unstyled">
                                                        <li id="displaylet" style="font-size: 15px;">
                                                        </li><br>
                                                        </ul>
                                                    </div>
                                                    </div>
                                                </div> --}}
                                                {{-- </div> --}}

                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Make Group Promocode</button>
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
    /*Object that includes array*/
    // var information = {
    //    letters: []
    //  }
    //  var boxes = document.getElementsByName("test");


    //       // Display the array in the console
    //       console.log(boxes);

    //  /* Array of Checkboxes */
    //  var boxesArr = Array.prototype.slice.call(boxes, 0);
    // // alert(boxesArr);
    //  function letter(e) {
    //    /* Filter out the checboxes that aren't checked */
    //    var checkedBoxes = boxesArr.filter((checkbox) => {
    //      return checkbox.checked;
    //    });

    //    /* Create a new array with only the checkbox values or letters */
    //    information.letters = checkedBoxes.map((checkbox) => {
    //      return checkbox.value;
    //    })

    //    var showAbc = information.letters.join(", "); //converts to string
    //    document.getElementById("displaylet").innerHTML = showAbc; //prints to HTML document
    //  }

    //  /*Event Listener*/
    //  boxes.forEach((checkbox) => {
    //    if (checkbox.attachEvent) {
    //      checkbox.attachEvent("onchange", letter);
    //    } else {
    //      checkbox.addEventListener("change", letter, false);
    //    }
    //  })
    var d = new Array();
    function chkbox(this1) {
        var s = this1.value;
        if (this1.checked) {

            d.push(s);
            document.getElementById("displaylet").innerHTML = d;

        } else {
            var index = d.indexOf(s);
            if (index > 1) {
                d.splice(index, 1);
                document.getElementById("displaylet").innerHTML = d;
            }
        }

    }


</script>
@endsection
