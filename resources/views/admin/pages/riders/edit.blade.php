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
                    <h1>Riders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Rider</li>
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
                    @if ($message = Session::get('RiderDetailSuccess'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif @if ($message = Session::get('RiderDetailError'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <!-- jquery validation -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Rider</small></h3>
                            <a type="button" href="{{ url('admin/riders') }}" class="btn btn-default float-right bg-primary">
                                Back

                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{ url('admin/update_rider') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $rider->_id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFirstName">First Name <span class="text-danger">*</span></label>
                                            <input type="text" name="f_name" value="{{ $rider->f_name }}" class="form-control{{ $errors->has('f_name') ? ' is-invalid' : '' }}" id="exampleFirstName" placeholder="First Name">
                                            @if ($errors->has('f_name'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('f_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Last Name </label>
                                            <input type="text" name="l_name" value="{{ $rider->l_name }}" class="form-control{{ $errors->has('l_name') ? ' is-invalid' : '' }}" id="exampleLastName" placeholder="Last Name">
                                            @if ($errors->has('l_name'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('l_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleMobileNumber">Mobile Number <span class="text-danger">*</span></label>
                                            <input type="number" name="contact" value="{{ $rider->contact }}" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" id="exampleMobileNumber" placeholder="Mobile Number">
                                            @if ($errors->has('contact'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('contact') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleEmailAddress">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="{{ $rider->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleEmailAddress" placeholder="Email">
                                            @if ($errors->has('email'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customFile">Profile Pic</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="profile_pic" accept="image/*" onchange="loadFile2(event)">

                                                <label class="custom-file-label" for="customFile">Choose
                                                    file</label>
                                                @if ($errors->has('profile_pic'))
                                                <span class="invalid feedback" role="alert">
                                                    <strong>{{ $errors->first('profile_pic') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="image-preview">
                                            <img src="{{ asset('admin/uploads/Riders/'. $rider->profile_pic ) }}" id="preview_img_id2" class="img-fluid" />
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="driverStatus">Status <span class="text-danger">*</span></label>
                                            <select id="driverStatus" class="form-control custom-select" name="status">
                                                <option>Select one</option>
                                                <option value="1" {{ ( 1 == $rider->status ? "selected":"") }}>Active</option>
                                                <option value="2" {{ ( 2 == $rider->status ? "selected":"") }}>Inactive</option>
                                            </select>



                                            @if ($errors->has('status'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>





                                </div>





                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
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
    var loadFile2 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id2');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile3 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id3');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile4 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id4');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile5 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id5');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile6 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id6');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile7 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id7');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile8 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id8');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile9 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id9');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>

<script>
    var loadFile10 = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_img_id10');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
@endsection