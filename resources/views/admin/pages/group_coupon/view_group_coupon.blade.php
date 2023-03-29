{{--
    <?php
    echo "<pre>";print_r($driver);exit();

    ?> --}}

    @extends('admin.layout.master')

    @section('style')


        <style>
            /* Custom CSS for toggle button */

        .btn-toggle {
          background-color: grey;
          color: #212529;
          border: none;
          outline: none;
          box-shadow: none;
          padding: 0.5rem 1rem;
          font-size: 1rem;
          line-height: 1.5;
          border-radius: 0.25rem;
        }
        .btn-toggle :hover{
            color:white;
        }
        /* .btn-toggle.active,
        .btn-toggle:active {
          background-color: green;
          color: #fff;
        } */

        .btn-toggle:focus {
          outline: none;
          box-shadow: none;
        }
        </style>
        @endsection



    @section('content')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1>Group Promocode</h1>

                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Group Promocode</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="card mx-3">
                <div class="card-header">

                    <form id="form_id" action="" method="GET">
                        <div class="row">
                            <div class="col-3">
                                <p for="">FIRST NAME</p>
                                <input type="text" name="fname" value="{{ request('fname') }}" id="fname"
                                    placeholder="Enter First Name" class="form-control">


                            </div>

                            <div class="col-3">
                                <p for="">LAST NAME</p>
                                <input type="text" name="lname" id="lname" value="{{ request('lname') }}"
                                    placeholder="Enter Last Name" class="form-control">


                            </div>
                            <div class="col-3">
                                <p for="">Email</p>
                                <input type="email" class="form-control" value="{{ request('email') }}" placeholder="Email"
                                    name="email">
                            </div>

                            <div class="col-3">
                                <p for="">Mobile Number</p>
                                <input type="number" class="form-control" value="{{ request('phone_number') }}" placeholder="Mobile Number"
                                    name="phone_number">
                            </div>


                            <div class="col-3">
                                <p for="">From Date</p>
                                <input type="date" class="form-control" value="{{ request('fromDate') }}" name="fromDate"
                                    placeholder="Date">

                            </div>
                            <div class="col-3">
                                <p for="">To Date</p>
                                <input type="date" class="form-control" value="{{ request('ToDate') }}" name="ToDate"
                                    placeholder="Date">
                            </div>

                        </div>


                        <br>
                        <button id="registerSubmit" class="btn btn-dark" type="submit">SEARCH</button>

                        <a href="{{url('view_group_promocode')}}" type="button" value="submit" class="btn btn-dark" > CLEAR</a>
                        {{-- <input type="button" class="btn btn-dark" id="clearbtn"  value="CLEAR"
                            onclick="myFunction()"> --}}

                    </form>

                </div>

            </div>
            <!-- Main content -->
            <div class="card mx-3">
                <div class="card-header">

                    <h3 class="card-title">Group Promocode</h3>


                          <li class="list-unstyled">
                            <a type="button" href="{{url('add_group')}}" class="btn btn-default float-right bg-primary">
                               Make Group
                            </a>
                          </li>




                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" data-sortable="true">NO</th>
                                <th class="text-center" data-sortable="true">GROUP NAME</th>
                                <th class="text-center" data-sortable="true">Promocodes</th>

                                <th class="text-center" data-sortable="true">CREATED DATE</th>


                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                        </tbody>

                    </table>

                    <br>
                    {{-- showign 1 to 6 total 7057  --}}


                   {{-- //'pagination.paginationlinks' --}}
                    {{-- {{ $driver->links() }} --}}
                </div>
                <!-- /.card-body -->
            </div>








        </div>
    @endsection

    @section('script')




    @endsection
