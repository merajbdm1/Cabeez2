@extends('admin.layout.master')
@section('style')
    <style>
        .booking_data_r {
            display: flex;
        }

        .booking_data_r p {
            width: 88px;
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
                        <h1>Edit Charging Hub</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit charging Hub</li>
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
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif @if ($message = Session::get('fail'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <!-- jquery validation -->

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Hub</small></h3>
                                    <a type="button" href="{{ url('view_hubs') }}" class="btn btn-default float-right bg-primary">
                                        View Hubs
            
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="quickForm" action="{{ url('hub_update',$editcharge->_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">Address<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="address"
                                                        class="form-control"
                                                        id="exampleFirstName" placeholder="Enter Address" value="{{ $editcharge->address }}">
                                                    @if ($errors->has('address'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLastName">Hub Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="hub_name"
                                                        class="form-control"
                                                        id="exampleLastName" placeholder="Enter Hub Name" value="{{ $editcharge->hub_name }}">
                                                    @if ($errors->has('hub_name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('hub_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Hub Address<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="hub_address"

                                                        class="form-control"
                                                        id="exampleMobileNumber" placeholder="Enter Hub Address" value="{{ $editcharge->hub_address }}">
                                                    @if ($errors->has('hub_address'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('hub_address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="driverStatus">Hub Status <span class="text-danger">*</span></label>
                                                <select id="driverStatus"  class="form-control"  name="hub_status" value="{{ old('hub_status') }}">
                                                    <option selected disabled >Select one</option>
                                                    <option value="1" {{ $editcharge->hub_status =='1' ? 'selected' :'' }}>Active</option>
                                                    <option value="0" {{ $editcharge->hub_status =='0' ? 'selected' :'' }}>Inactive</option>
                                                </select>
                                                @if ($errors->has('hub_status'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('hub_status') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update Hub</button>
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
