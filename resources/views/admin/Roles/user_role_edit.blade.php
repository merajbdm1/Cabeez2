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
                        <h1>Edit Assign Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit User Role</li>
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
                                    <h3 class="card-title">Edit User Role</small></h3>
                                    <a type="button" href="{{ url('role_list') }}" class="btn btn-default float-right bg-primary">
                                        View Assgin Roles
            
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="quickForm" action="{{ url('role_post_update',$editrolelist->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name"
                                                        class="form-control"
                                                        id="exampleFirstName" placeholder="Enter Name" value="{{ $editrolelist->name }}">
                                                    @if ($errors->has('name'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLastName">Email<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="email"
                                                        class="form-control"
                                                        id="exampleLastName" placeholder="Enter Email" value="{{ $editrolelist->email }}">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Password<span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" name="password" class="form-control" 
                                                     placeholder="Enter password" value="{{ $editrolelist->password }}">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleMobileNumber">Role<span class="text-danger">*</span></label>
                                                    <select  name="role" class="form-control">
                                                        <option>Select Option</option>
                                                       <?php foreach($alldatarolelist as $item){ ?>
                                                        <option value="{{ $item->role_name }}" @if($editrolelist->role == $item->role_name) selected='selected' @endif> {{ $item->role_name}}</option>
                                                      <?php }?>
                                                    </select>

                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update Assign Role</button>
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
