

    @extends('admin.layout.master')

    @section('style')


   @endsection



    @section('content')
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6">
                            <h1>Settlement</h1>

                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Settlement</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            {{-- <div class="card mx-3">
                <div class="card-header">

                    <form id="form_id" action="{{ route('search') }}" method="GET">
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
                                <p for="">Vehicle Category</p>
                                <select name="category_id" id=""  class="form-control">
                                    <option value="">-Select category-</option>
                                    @foreach($vehicle_driv as $key=>$fob)
                                    <option value="{{$fob->id}}" {{ request('category_id') == $fob->id ? "selected" :""}}>{{$fob->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-3">
                                <p for="">Avability</p>
                                <select name="is_available" id="" class="form-control">
                                    <option value="">-Select Avalibilty-</option>
                                    <option value="1" {{ request('is_available') == "1" ? "selected" :""}}>Available</option>
                                    <option value="0" {{ request('is_available') == "0" ? "selected" :""}}>UnAvailable</option>

                                </select>
                            </div>


                            <div class="col-3">
                                <p for="">Booking Range From</p>
                                <input type="date" class="form-control" value="{{ request('fromDate') }}" name="fromDate"
                                    placeholder="Date">

                            </div>
                            <div class="col-3">
                                <p for="">Booking Range To</p>
                                <input type="date" class="form-control" value="{{ request('ToDate') }}" name="ToDate"
                                    placeholder="Date">
                            </div>

                        </div>


                        <br>
                        <button id="registerSubmit" class="btn btn-dark" type="submit">SEARCH</button>

                        <a href="{{url('/admin/driver')}}" type="button" value="submit" class="btn btn-dark" > CLEAR</a>

                    </form>

                </div>

            </div> --}}

            <div class="card mx-3">
                <div class="card-header">

                    <h3 class="card-title">All Settlement</h3>


                </div>

                <div class="card-body">
                    <table data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="text-center" data-sortable="true">NO</th>
                                <th class="text-center" data-sortable="true">DRIVER NAME</th>


                                <th class="text-center" data-sortable="true">TOTAL CASH</th>

                                <th class="text-center" data-sortable="true">CREATED DATE</th>
                                <th class="text-center" data-sortable="true">ACTION</th>



                            </tr>
                        </thead>
                        <tbody>







                        </tbody>

                    </table>

                    <br>

                   <div class="laravell_paginate">
                    <div class="row">

                        {{-- <div class="col-7">
                            Showing {{ $driver->firstItem() }} - {{ $driver->lastItem()}} Total {{ $driver->total() }}
                        </div>
                        <div class="col-5">
                           {!! $driver->appends(Request::all())->links(); !!}
                        </div> --}}

                    </div>
                   </div>



                </div>

            </div>



        </div>
    @endsection

    @section('script')

        

    @endsection
