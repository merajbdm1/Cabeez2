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
                                <form id="quickForm" action="{{ url('admin/driver_process') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">Group Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="group_name"
                                                        class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                        id="exampleFirstName" placeholder="Group Name"
                                                        value="{{ old('first_name') }}">
                                                    @if ($errors->has('first_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFirstName">Rider List<span>

                                                </div>
                                                <style>
                                                    .rider_data {
                                                        background: #ffffff;
                                                        height: 350px;
                                                        overflow-x: hidden;
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
                                                      <input  type="text" class="form-control"
                                                      placeholder="Search Rider or Mobile">
                                                <div class="rider_data" class="fixedsearch">
                                                    <div class="card-body">
                                                        <table data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" data-sortable="true">NO</th>
                                                                    <th class="text-center" data-sortable="true">FIRST NAME</th>
                                                                    <th class="text-center" data-sortable="true">LAST NAME</th>
                                                                    <th class="text-center" data-sortable="true">MOBILE NO</th>
                                                                    <th class="text-center" data-sortable="true">Select Rider</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($viewrider as $key=>$driver_model)


                                                            <tr>
                                                                <td class="text-center">{{ ($viewrider->currentpage()-1) * $viewrider->perpage() + $key + 1 }}</td>
                                                                <td class="text-center">{{ $driver_model->first_name }}</td>
                                                                <td class="text-center">{{ $driver_model->last_name }}
                                                                </td>
                                                                <td class="text-center">{{ $driver_model->phone_number }}</td>
                                                                <td class="text-center"><input type="checkbox" value="checkbox"></td>
                                                            </tr>
                                                        @endforeach

                                                            </tbody>

                                                        </table>

                                                        <br>
                                                        {{-- showign 1 to 6 total 7057  --}}
                                                       <div class="laravell_paginate">
                                                        <div class="row">

                                                            <div class="col-7">
                                                                Showing {{ $viewrider->firstItem() }} - {{ $viewrider->lastItem()}} Total {{ $viewrider->total() }}
                                                            </div>
                                                            <div class="col-5">
                                                               {!! $viewrider->appends(Request::all())->links(); !!}
                                                            </div>

                                                        </div>
                                                       </div>


                                                       {{-- //'pagination.paginationlinks' --}}
                                                        {{-- {{ $driver->links() }} --}}
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
@endsection
