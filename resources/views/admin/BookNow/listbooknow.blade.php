@extends('admin.layout.master')
@section('style')
@endsection
<style>
    nav svg {
        max-height: 10px;
    }

    body {
        background: #f6f6f6;
    }

    .wrapper {
        /* max-width: 80vw; */
        min-width: 275px;
        /* margin: 10vh auto; */
    }

    .tabs {
        display: flex;
        //border: 1px solid #ccc;
        border-bottom: none;
    }

    .tab {
        padding: 12px 20px;
        cursor: pointer;
        border-right: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        border-top: 1px solid #ccc;
        background-color: #f6f6f6;
        //width: 150px; /* adjust as needed */
        text-align: center;
    }

    .tab.active {
        border-bottom: none;
        border-right: none;
        border-left: none;
        background-color: #fff;
    }

    .tab:hover {
        background: #fff;
    }

    .tab.active:first-child {
        border-left: 1px solid #ccc;
    }

    .tab.active:last-child {
        border-right: 1px solid #ccc;
        border-left: 1px solid #ccc;
    }

    .active {
        display: block;
    }

    .tab-content {
        background-color: #fff;
    }

    .tab-content-item {
        border: 1px solid #ccc;
        display: none;
        max-width: 100%;
        margin-top: -1px;
        padding-inline: 20px;
    }

    .tab-content-item.active {
        display: block;
    }
</style>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="active_title">Book Now</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Book Now</li>
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

                            <div class="card">
                                <div class="card-header">

                                    <form id="form_id" method="get">
                                        <div class="row">
                                            <div class="col-3">
                                                <p for="">ID</p>
                                                <input type="text"class="form-control" placeholder="ID"
                                                    id="id" name="id">
                                                {{-- onchange="check_data()"  --}}
                                            </div>
                                            <div class="col-3">
                                                <p for="">Ride Number</p>
                                                <input type="text" class="form-control" placeholder="Ride Number"
                                                     name="ride_number">
                                            </div>

                                            <div class="col-3">
                                                <p for="">Rider</p>
                                                <input type="text" class="form-control" placeholder="Rider ID" name="rider_id">
                                            </div>

                                            <div class="col-3">
                                                <p for="">Driver</p>
                                                <input type="text" class="form-control" placeholder="Driver ID" name="driver_id">
                                            </div>

                                            <div class="col-3">
                                                <p for="">Rider Status</p>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">-Select Status-</option>
                                                    <option value="timeout">Time out</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="customer_cancelled">Customer Cancelled</option>
                                                    <option value="admin_cancelled">Admin Cancelled</option>
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <p for="">Payment Type</p>
                                                <select name="payment_type" id="" class="form-control">
                                                    <option value="">-Select Status-</option>
                                                    <option value="online">Online</option>
                                                    <option value="cash">Cash</option>
                                                </select>
                                            </div>

                                          

                                            <div class="col-3">
                                                <p for="">Booking Date Range From</p>
                                                <input type="date" class="form-control" name="fromDate">
                                            </div>

                                            <div class="col-3">
                                                <p for="">Booking Range To Date</p>
                                                <input type="date" class="form-control" name="ToDate">
                                            </div>

                                        </div>
                                        <br>
                                        <button class="btn btn-dark" type="submit">SEARCH</button>

                                        <input type="button" onclick="myFunction()" class="btn btn-dark" value="CLEAR">

                                    </form>

                                </div>
                            </div>
                    </div>
                    <div class="card">
                        <p id="ride_number"></p>
                        <div class="card-header">

                            <div class="wrapper">

                                <div class="tabs">
                                    <div class="tab active" data-tab-content="tab1-content" onclick=toggleTab()> Book Now
                                    </div>
                                    <div class="tab" data-tab-content="tab5-content" onclick=toggleTab()>Pre Book </div>
                                    <div class="tab" data-tab-content="tab2-content" onclick=toggleTab()>Out Station
                                    </div>
                                    <div class="tab" data-tab-content="tab3-content" onclick=toggleTab()>Rental</div>
                                    <div class="tab" data-tab-content="tab4-content" onclick=toggleTab()>Corporate</div>
                                    
                                </div>

                                <div class="tab-content">
                                    <div class="tab-content-item active" id="tab1-content">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped tab_ajax">
                                                <thead>
                                                    <tr>
                                                        <th>SERIAL NO</th>
                                                        <th>RIDER ID</th>
                                                        <th>RIDER NUMBER</th>
                                                        <th>CATEGAORY</th>
                                                        <th>PAYMENT TYPE</th>
                                                        <th>BOOKING DATE & TIME</th>
                                                       
                                                        <th>RIDER ID</th>
                                                        <th>RIDER </th>
                                                        <th>DRIVER ID</th>
                                                        <th>DRIVER</th>
                                                        <th>RIDE FARE</th>
                                                        <th>TOLL TAXES</th>
                                                        <th>RIDE TYPE</th>
                                                        <th>RIDE STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody">


                                                </tbody>

                                            </table>
                                            <br>
                                            {{-- {{ $getbook->links() }} --}}
                                        </div>
                                    </div>
                                    <div class="tab-content-item" id="tab2-content">
                                       
                                            
                                    </div>

                                    <div class="tab-content-item" id="tab3-content">

                                    </div>


                                    <div class="tab-content-item" id="tab4-content">

                                    </div>
                                    <div class="tab-content-item" id="tab5-content">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped tab_ajax">
                                                <thead>
                                                    <tr>
                                                        <th>SERIAL NO</th>
                                                        <th>RIDER ID</th>
                                                        <th>RIDER NUMBER</th>
                                                        <th>CATEGAORY</th>
                                                        <th>PAYMENT TYPE</th>
                                                        <th>BOOKING DATE & TIME</th>
                                                       
                                                     
                                                        <th>RIDER </th>
                                                        <th>DRIVER ID</th>
                                                        <th>DRIVER</th>
                                                        <th>RIDE FARE</th>
                                                        <th>TOLL TAXES</th>
                                                        <th>RIDE TYPE</th>
                                                        <th>RIDE STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="prebook_tbody">


                                                </tbody>

                                            </table>
                                            <br>
                                            {{-- {{ $getbook->links() }} --}}
                                   
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->

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

    <script>
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content-item');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(tab => tab.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                this.classList.add('active');
                document.getElementById(this.dataset.tabContent).classList.add('active');
                const activeTab = document.querySelector('.tab.active');
                const activeTabContent = activeTab.innerText;
                const breadcrumbItemContent = document.querySelector('.breadcrumb-item.active');
                const activeTitle = document.querySelector('.active_title');
                activeTitle.innerText = activeTabContent;
                breadcrumbItemContent.innerText = activeTabContent;
            });
        });


        function myFunction() {
            document.getElementById("form_id").reset();
            load_data();
        }
    </script>

    <script>
        var frm = $('#form_id');
        $(document).ready(function() {
            load_data();
        });

        function load_data() {
            $.ajax({
                type: frm.attr('method'),
                url: '/search',
                data: frm.serialize(),
                success: function(data) {
                   
                    var output = '';
                    var output2 = '';
                    var parsedData = JSON.parse(data);
                    // console.log(data);
                    var allData = parsedData.employees;
                    var allData2 = parsedData.employees2;
                
                    if (parsedData.employees.length > 0) {
                        for (var count = 0; count < parsedData.employees.length; count++) {
                            if(allData[count].is_pre_booking == 1){
                                var a1 ="Now";
                            output += '<tr>';
                            output += '<td>' + count + '</td>';   
                            output += '<td>' + allData[count].id + '</td>';
                            output += '<td>' + allData[count].ride_number + '</td>';
                            output += '<td>' + allData[count].car_category + '</td>';
                            output += '<td>' + allData[count].payment_type + '</td>';
                            
                            output += '<td>' + allData[count].booking_date + '</td>';
                            //output += '<td><img src="'+allData[count].car_category_icon+'" width="50px" height="50px" ></td>';
                            output += '<td>' + allData[count].rider_id + '</td>';
                            output += '<td>' + + '</td>';
                            output += '<td>' + allData[count].driver_id + '</td>';
                            output += '<td>' + + '</td>';
                            output += '<td>' + allData[count].ride_amount + '</td>';
                            output += '<td>' + allData[count].toll_total + '</td>';
                            output += '<td>' +   a1 + '</td>';
                            output += '<td>' + allData[count].status + '</td>';
                            output += '<td><a href="booknow_view/' + allData[count]._id + '" class="btn btn-primary" ><i class="fas fa-eye"></i></a></td>';
                            output += '</tr>';
                            }
                        }
                    } else {
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('.tbody').html(output);
   
                    
                    if (parsedData.employees2.length > 0) {
                        
                        for (var count2 = 0; count2 < parsedData.employees2.length; count2++) {
                            if(allData2[count2].is_pre_booking == 0){
                                var a2 ="Pre Book";
                            
                            output2 += '<tr>';
                            output2 += '<td>' + count2 + '</td>';   
                            output2 += '<td>' + allData2[count2].id + '</td>';
                            output2 += '<td>' + allData2[count2].ride_number + '</td>';
                            output2 += '<td>' + allData2[count2].car_category + '</td>';
                            output2 += '<td>' + allData2[count2].payment_type + '</td>';
                            
                            output2 += '<td>' + allData2[count2].booking_date + '</td>';
                            output2 += '<td>' + + '</td>';
                                
                            //output2 += '<td><img src="'+allData2[count2].car_category_icon+'" width="50px" height="50px" ></td>';
                            output2 += '<td>' + allData2[count2].rider_id + '</td>';
                           output2 += '<td>' + + '</td>';

                            output2 += '<td>' + allData2[count2].driver_id + '</td>';
                           
                            output2 += '<td>' + allData2[count2].ride_amount + '</td>';
                            output2 += '<td>' + allData2[count2].toll_total + '</td>';
                            output2 += '<td>' + a2 +'</td>';
                            output2 += '<td>' + allData2[count2].status + '</td>';
                            output2 += '<td><a href="booknow_view/' + allData2[count2]._id + '" class="btn btn-primary" ><i class="fas fa-eye"></i></a></td>';
                            output2 += '</tr>';
                            }
                        }
                    } else {
                        output2 += '<tr>';
                        output2 += '<td colspan="6">No Data Found</td>';
                        output2 += '</tr>';
                    }
                    $('.prebook_tbody').html(output2);
                },



            });
        }


        
        frm.submit(function(e) {

            e.preventDefault();
            load_data();
        });


    </script>
@endsection
