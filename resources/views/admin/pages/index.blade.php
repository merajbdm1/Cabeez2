@extends('admin.layout.master')
@section('style')
<style>
    /* a{
       color:black !important;
   } */
   .inner a{
       color:#000;


   }
   .small-box>.inner {
       padding: 10px;
       height: 130px;
       box-shadow: rgb(0 0 0 / 16%) 0px 3px 6px, rgb(0 0 0 / 23%) 0px 3px 6px;
   }
   .mapview{height: 600px;}



.small-box>.inner {
    padding: 10px;
    height: 130px;
    box-shadow: rgb(0 0 0 / 16%) 0px 3px 6px, rgb(0 0 0 / 23%) 0px 3px 6px;
}
.mapview{height: 600px;}

#map {margin: 0;padding: 0;width: 100%;height: 100%;}

</style>
@endsection



@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">



                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box" >
                            <div class="inner" >
                                {{-- <h3>150</h3> --}}
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Present <span>45</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Absent <span>65</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Weekly Off <span>23</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">P-Paid <span>78</span></a>
                            </div>
                            <div class="icon">
                                <i class=""></i>
                            </div>
                            <a href="#" class="small-box-footer bg-primary">Driver Status</a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box " >
                            <div class="inner" >

                                <a href="javascript:void(0);" class="d-flex justify-content-between">Assigned <span>30</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Accepted <span>12</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Pre-Accepted <span>10</span></a>

                            </div>
                            <div class="icon">

                            </div>
                            <a href="#" class="small-box-footer bg-success">Rides Status</a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box ">
                            <div class="inner">
                                {{-- <h3>44</h3> --}}
                                <div class="inner">
                                    <a href="javascript:void(0);" class="d-flex justify-content-between">Arrived <span>10</span></a>
                                    <a href="javascript:void(0);" class="d-flex justify-content-between">Started <span>11</span></a>
                                    <a href="javascript:void(0);" class="d-flex justify-content-between">Ended <span>5</span></a>
                                </div>
                            </div>
                            <div class="icon">

                            </div>
                            <a href="#" class="small-box-footer bg-info">Trip Status </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box ">
                            <div class="inner">
                                <div class="inner" >

                                    <a href="javascript:void(0);" class="d-flex justify-content-between">Admin Cancelled<span>22</span></a>
                                    <a href="javascript:void(0);" class="d-flex justify-content-between">Customer Cancelled <span>28</span></a>


                                </div>
                            </div>
                            <div class="icon">

                            </div>
                            <a href="#" class="small-box-footer bg-danger">Cancellation Status <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 ">
                        <!-- small box -->
                        <div class="small-box ">
                            <div class="inner" >
                                {{-- <h3>150</h3> --}}

                                <a href="javascript:void(0);" class="d-flex justify-content-between">Completed <span>33</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Revenue  <span>23</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">AEPT <span>25</span></a>

                            </div>
                            <div class="icon">

                            </div>
                            <a href="#" class="small-box-footer bg-primary">Completion Status</a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box ">
                            <div class="inner" >

                                <a href="javascript:void(0);" class="d-flex justify-content-between"> City <span>36</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Inter City<span>28</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Rental <span>30</span></a>

                            </div>
                            <div class="icon">

                            </div>
                            <a href="#" class="small-box-footer bg-success">Completed Trip Type</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box ">
                            <div class="inner" >
                                {{-- <h3>150</h3> --}}

                                <a href="javascript:void(0);" class="d-flex justify-content-between">Online <span>45</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Cash <span>65</span></a>

                            </div>
                            <div class="icon">
                                <i class=""></i>
                            </div>
                            <a href="#" class="small-box-footer bg-info">Revenue Status </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box ">
                            <div class="inner" >

                                <a href="javascript:void(0);" class="d-flex justify-content-between">Total <span>30</span></a>
                                <a href="javascript:void(0);" class="d-flex justify-content-between">Current <span>12</span></a>

                            </div>
                            <div class="icon">

                            </div>
                            <a href="#" class="small-box-footer bg-danger">Requested Rides</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box ">
                            <div class="inner">

                                <a href="javascript:void(0);" class="d-flex justify-content-between">Idle Drivers</a>


                            </div>
                            <div class="icon">

                            </div>
                            <a href="#" class="small-box-footer bg-primary">Idle Drivers</a>
                        </div>
                    </div>




                    <div class="col-lg-12 col-6">
                        <div class="mapview"> 
                            <div id="map"></div>
                            <div id="show-result"></div>
                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30163.89168212218!2d72.85175932707517!3d19.08630356917822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9abc81d7d3f%3A0x7c8b5869486ac221!2sCAB%20EEZ%20Infra%20Tech%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1676275287825!5m2!1sen!2sin" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        </div>
                    </div>


                </div>
                <!-- /.row -->
                <!-- Main row -->
                {{-- <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Sales
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Direct Chat</h3>

                                <div class="card-tools">
                                    <span title="3 New Messages" class="badge badge-primary">3</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" title="Contacts"
                                        data-widget="chat-pane-toggle">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="{{ asset('admin/dist/img/user1-128x128.jpg') }}"
                                            alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="{{ asset('admin/dist/img/user3-128x128.jpg') }}"
                                            alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            You better believe it!
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="{{ asset('admin/dist/img/user1-128x128.jpg') }}"
                                            alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Working with AdminLTE on a great new app! Wanna join?
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="{{ asset('admin/dist/img/user3-128x128.jpg') }}"
                                            alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            I would love to.
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                </div>
                                <!--/.direct-chat-messages-->

                                <!-- Contacts are loaded here -->
                                <div class="direct-chat-contacts">
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="{{ asset('admin/dist/img/user1-128x128.jpg') }}"
                                                    alt="User Avatar">

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Count Dracula
                                                        <small class="contacts-list-date float-right">2/28/2015</small>
                                                    </span>
                                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="{{ asset('admin/dist/img/user7-128x128.jpg') }}"
                                                    alt="User Avatar">

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Sarah Doe
                                                        <small class="contacts-list-date float-right">2/23/2015</small>
                                                    </span>
                                                    <span class="contacts-list-msg">I will be waiting for...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="{{ asset('admin/dist/img/user3-128x128.jpg') }}"
                                                    alt="User Avatar">

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Nadia Jolie
                                                        <small class="contacts-list-date float-right">2/20/2015</small>
                                                    </span>
                                                    <span class="contacts-list-msg">I'll call you back at...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="{{ asset('admin/dist/img/user5-128x128.jpg') }}"
                                                    alt="User Avatar">

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Nora S. Vans
                                                        <small class="contacts-list-date float-right">2/10/2015</small>
                                                    </span>
                                                    <span class="contacts-list-msg">Where is your new...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="{{ asset('admin/dist/img/user6-128x128.jpg') }}"
                                                    alt="User Avatar">

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        John K.
                                                        <small class="contacts-list-date float-right">1/27/2015</small>
                                                    </span>
                                                    <span class="contacts-list-msg">Can I take a look at...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="{{ asset('admin/dist/img/user8-128x128.jpg') }}"
                                                    alt="User Avatar">

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Kenneth M.
                                                        <small class="contacts-list-date float-right">1/4/2015</small>
                                                    </span>
                                                    <span class="contacts-list-msg">Never mind I found...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                    </ul>
                                    <!-- /.contacts-list -->
                                </div>
                                <!-- /.direct-chat-pane -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..."
                                            class="form-control">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!--/.direct-chat -->

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    To Do List
                                </h3>

                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    <li>
                                        <!-- drag handle -->
                                        <span class="handle">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                        <!-- checkbox -->
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                            <label for="todoCheck1"></label>
                                        </div>
                                        <!-- todo text -->
                                        <span class="text">Design a nice theme</span>
                                        <!-- Emphasis label -->
                                        <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo2" id="todoCheck2"
                                                checked>
                                            <label for="todoCheck2"></label>
                                        </div>
                                        <span class="text">Make the theme responsive</span>
                                        <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                            <label for="todoCheck3"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                            <label for="todoCheck4"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                            <label for="todoCheck5"></label>
                                        </div>
                                        <span class="text">Check your messages and notifications</span>
                                        <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="handle">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                            <label for="todoCheck6"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                                    Add item</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map card -->
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Visitors
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div>
                            <!-- /.card-body-->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-white">Visitors</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-white">Online</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-white">Sales</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card -->

                        {{--   



                        <!-- solid sales graph -->
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-th mr-1"></i>
                                    Sales Graph
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas class="chart" id="line-chart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="20"
                                            data-width="60" data-height="60" data-fgColor="#39CCCC">

                                        <div class="text-white">Mail-Orders</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="50"
                                            data-width="60" data-height="60" data-fgColor="#39CCCC">

                                        <div class="text-white">Online</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="30"
                                            data-width="60" data-height="60" data-fgColor="#39CCCC">

                                        <div class="text-white">In-Store</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">

                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                            data-toggle="dropdown" data-offset="-52">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a href="#" class="dropdown-item">Add new event</a>
                                            <a href="#" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- right col -->
                </div> --}}
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
<script>
    // map = new mappls.Map('map', {center:{lat:28.612964,lng:77.229463} });
    var map,Marker1,centerMarker;

    function initMap1() {
    map = new mappls.Map('map', {

    });

    Marker1 = new mappls.Marker({
    map: map,
    position: {
      "lat": 28.519467,
      "lng": 77.223150
    },
    fitbounds: true,
    popupHtml: 'MapmyIndia',
    draggable: true
  });

  map.addListener('drag', function(e) {
            let divId=document.getElementById("show-result");
            divId.style.display="block";
            divId.innerHTML = `Map Event Type :   ${e.lngLat}`;
        });

        map.addListener('dragend', function(e) {
            let divId=document.getElementById("show-result");
            divId.style.display="block";
            divId.innerHTML = `Map Event Type :   ${e.type}`;
        });

    map.addListener('click', function(e) {
        let divId=document.getElementById("show-result");
        divId.style.display="block";
        divId.innerHTML = `Map Click Event :   ${e.lngLat}`;

@section('script')

<script>
    // map = new mappls.Map('map', {center:{lat:28.612964,lng:77.229463} });
    var map,Marker1,centerMarker;

    function initMap1() {
    map = new mappls.Map('map', {
        
    });

    Marker1 = new mappls.Marker({
    map: map,
    position: {
      "lat": 28.519467,
      "lng": 77.223150
    },
    fitbounds: true,
    popupHtml: 'MapmyIndia',
    draggable: true
  });

  map.addListener('drag', function(e) {
            let divId=document.getElementById("show-result");
            divId.style.display="block";
            divId.innerHTML = `Map Event Type :   ${e.lngLat}`;
        });

        map.addListener('dragend', function(e) {
            let divId=document.getElementById("show-result");
            divId.style.display="block";
            divId.innerHTML = `Map Event Type :   ${e.type}`;
        });

    map.addListener('click', function(e) {
        let divId=document.getElementById("show-result");
        divId.style.display="block";
        divId.innerHTML = `Map Click Event :   ${e.lngLat}`;
        

        // Marker1 = new mappls.Marker({
        //     map: map,
        //     position: {"lat": e.lngLat.lat,"lng": e.lngLat.lng },
        //     fitbounds: true,
        //     popupHtml: `<div>Latitude and Longitude of Marker</div>
        //     <div>"lat": ${e.lngLat.lat},"lng": ${e.lngLat.lng}</div>`
        // });
        // console.log(e.lngLat.lng);
        // console.log(e.lngLat.lat);
         
        
        
    });
    

    var pts = [{
            lat: 28.55108,
            lng: 77.26913
        }, {
            lat: 28.55106,
            lng: 77.26906
        }, {
            lat: 28.55105,
            lng: 77.26897
        }, {
            lat: 28.55101,
            lng: 77.26872
        }, {
            lat: 28.55099,
            lng: 77.26849
        }, {
            lat: 28.55097,
            lng: 77.26831
        }, {
            lat: 28.55093,
            lng: 77.26794
        }, {
            lat: 28.55089,
            lng: 77.2676
        }, {
            lat: 28.55123,
            lng: 77.26756
        }, {
            lat: 28.55145,
            lng: 77.26758
        }, {
            lat: 28.55168,
            lng: 77.26758
        }, {
            lat: 28.55175,
            lng: 77.26759
        }, {
            lat: 28.55177,
            lng: 77.26755
        }, {
            lat: 28.55179,
            lng: 77.26753
        }];

        var gradient = ['rgba(0, 255, 255, 0)', 'rgba(0, 255, 255, 1)', 'rgba(0, 191, 255, 1)', 'rgba(0, 127, 255, 1)', 'rgba(0, 63, 255, 1)', 'rgba(0, 0, 255, 1)', 'rgba(0, 0, 223, 1)', 'rgba(0, 0, 191, 1)', 'rgba(0, 0, 159, 1)', 'rgba(0, 0, 127, 1)', 'rgba(63, 0, 91, 1)', 'rgba(127, 0, 63, 1)', 'rgba(191, 0, 31, 1)', 'brown'];

        var heat_map = new mappls.HeatmapLayer({
            map: map,
            data: pts,
            gradient: gradient,
            fitbounds: true
        });
    }
</script>
@endsection



        // Marker1 = new mappls.Marker({
        //     map: map,
        //     position: {"lat": e.lngLat.lat,"lng": e.lngLat.lng },
        //     fitbounds: true,
        //     popupHtml: `<div>Latitude and Longitude of Marker</div>
        //     <div>"lat": ${e.lngLat.lat},"lng": ${e.lngLat.lng}</div>`
        // });
        // console.log(e.lngLat.lng);
        // console.log(e.lngLat.lat);



    });


    var pts = [{
            lat: 28.55108,
            lng: 77.26913
        }, {
            lat: 28.55106,
            lng: 77.26906
        }, {
            lat: 28.55105,
            lng: 77.26897
        }, {
            lat: 28.55101,
            lng: 77.26872
        }, {
            lat: 28.55099,
            lng: 77.26849
        }, {
            lat: 28.55097,
            lng: 77.26831
        }, {
            lat: 28.55093,
            lng: 77.26794
        }, {
            lat: 28.55089,
            lng: 77.2676
        }, {
            lat: 28.55123,
            lng: 77.26756
        }, {
            lat: 28.55145,
            lng: 77.26758
        }, {
            lat: 28.55168,
            lng: 77.26758
        }, {
            lat: 28.55175,
            lng: 77.26759
        }, {
            lat: 28.55177,
            lng: 77.26755
        }, {
            lat: 28.55179,
            lng: 77.26753
        }];

        var gradient = ['rgba(0, 255, 255, 0)', 'rgba(0, 255, 255, 1)', 'rgba(0, 191, 255, 1)', 'rgba(0, 127, 255, 1)', 'rgba(0, 63, 255, 1)', 'rgba(0, 0, 255, 1)', 'rgba(0, 0, 223, 1)', 'rgba(0, 0, 191, 1)', 'rgba(0, 0, 159, 1)', 'rgba(0, 0, 127, 1)', 'rgba(63, 0, 91, 1)', 'rgba(127, 0, 63, 1)', 'rgba(191, 0, 31, 1)', 'brown'];

        var heat_map = new mappls.HeatmapLayer({
            map: map,
            data: pts,
            gradient: gradient,
            fitbounds: true
        });
    }
</script>
