
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
                    <h1>Global Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Map My Inida</li>
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
                    @endif @if ($message = Session::get('fail_message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <!-- jquery validation -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add</small></h3>
                            <a type="button" href="{{ url('view_global') }}" class="btn btn-default float-right bg-primary">
                                View

                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form  action="{{ url('post_mapindia') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Clint Id<span class="text-danger">*</span></label>
                                            <input type="text" name="client_id" class="form-control" value="{{ old('client_id') }}" id="exampleLastName" placeholder="Client ID">
                                            @if ($errors->has('client_id'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('client_id') }}</strong>
                                                        </span>
                                                    @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Client Secreat Key<span class="text-danger">*</span></label>
                                            <input type="text" name="client_secreat_key" class="form-control" value="{{ old('client_secreat_key') }}" id="exampleLastName" placeholder="Client Secreat Key">
                                            @if ($errors->has('client_secreat_key'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('client_secreat_key') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Status <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" id="cars">
                                            <option value="">--Select Status--</option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>

                                            </select>
                                        </div>

                                    </div>



                                    <!-- /.card -->
                                </div>
                                <!--/.col (left) -->
                                <!-- right column -->
                                <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Add</button>
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
