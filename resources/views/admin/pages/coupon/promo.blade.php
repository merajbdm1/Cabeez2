@extends('admin.layout.master')
@section('style')
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Promo Codes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Promocode</li>
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
                <div class="col-md-4">
                    @if($message = Session::get('PromocodeSuccess'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div> @endif @if($message = Session::get('PromocodeError')) <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div> @endif
                    <!-- jquery validation -->


                    @if(isset($edit_promocode))
                    <?php 
                    $check_role= Session::get('role');
                    $data = \App\Models\AllDataTableRolesAndPermission::get();
                    foreach($data as $item)
                    {
                     $check_role_name = $item->role_name;
                      foreach ($item->promocode_permissions as $value) 
                      {
                           if($value == 'Edit')//Users
                           {
                            $checkAdd = $value;
                            
                            if($check_role == $check_role_name && $checkAdd)
                              { 

                          ?>
                        

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Promo Code</small></h3>

                        </div>
                        <!-- /.card-header -->
                        <!--  form start -->
                        <form id="quickForm" action="{{ url('admin/update_promocode') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFirstName">Code</label>
                                            <input type="text" name="promo_code" value="{{ $edit_promocode->promo_code }}" class="form-control{{ $errors->has('promo_code') ? ' is-invalid' : '' }}" id="exampleCode" placeholder="Code">
                                            @if ($errors->has('promo_code'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('promo_code') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Title</label>
                                            <input type="text" name="promo_title" value="{{ $edit_promocode->promo_title }}" class="form-control{{ $errors->has('promo_title') ? ' is-invalid' : '' }}" id="examplepromo_title" placeholder="Title">
                                            @if ($errors->has('promo_title'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('promo_title') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleDiscount">Discount</label>
                                            <input type="text" name="discount" value="  {{ $edit_promocode->discount }} " class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" id="discount" placeholder="Discount">
                                            @if ($errors->has('discount'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('discount') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLimit_Discount">Limit Per User</label>
                                            <input type="text" name="limit_per_user" value="{{ $edit_promocode->limit_per_user }}" class="form-control{{ $errors->has('limit_per_user') ? ' is-invalid' : '' }}" id="limit_per_user" placeholder="Limit Per User">
                                            @if ($errors->has('limit_per_user'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('limit_per_user') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLimit_Discount">Used Count</label>
                                            <input type="text" name="used_count" value="{{ $edit_promocode->used_count }}" class="form-control{{ $errors->has('used_count') ? ' is-invalid' : '' }}" id="used_count" placeholder="Used Count">
                                            @if ($errors->has('used_count'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('used_count') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount_type">Discount Type</label>
                                            <select id="discount_type" class="form-control{{ $errors->has('discount_type') ? ' is-invalid' : '' }} custom-select" name="discount_type">
                                                <option selected disabled>Select</option>
                                                <option value="percentage">Percentage</option>
                                                <option value="amount">Amount</option>
                                            </select>
                                            @if ($errors->has('discount_type'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('discount_type') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }} custom-select" name="status">
                                                @if ($edit_promocode->status == 'Active')
                                                <option value="{{ $edit_promocode->status }}" {{ $edit_promocode->status === $edit_promocode->status? 'Active' : 'Inactive' }}>Active</option>
                                                <option value="Inactive">Inactive</option>
                                                @elseif ($edit_promocode->status == 'Inactive')
                                                <option value="{{ $edit_promocode->status }}" {{ $edit_promocode->status === $edit_promocode->status? 'Inactive' : 'Active' }}>Inactive</option>
                                                <option value="Active">Active</option>
                                                @endif
                                            </select>
                                            @if ($errors->has('status'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('status') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example_startdate">Start Date</label>
                                            <input type="date" name="start_date" value="{{ $edit_promocode->start_date }}" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="example_start_date" placeholder="Start Date">
                                            @if ($errors->has('start_date'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('start_date') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example_enddate">End Date</label>
                                            <input type="date" name="end_date" value="{{ $edit_promocode->end_date }}" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="example_end_date" placeholder="End Date">
                                            @if ($errors->has('end_date'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('end_date') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <input type="hidden" name="_id" value="{{ $edit_promocode->_id }}">



                                </div>





                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    <?php } } } }?>


                    <?php 
                    $check_role= Session::get('status');
            
                            if($check_role == '1')//develeoper mode
                              { 
                          ?>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Promo Code</small></h3>
        
                                </div>
                                <!-- /.card-header -->
                                <!--  form start -->
                                <form id="quickForm" action="{{ url('admin/update_promocode') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">Code</label>
                                                    <input type="text" name="promo_code" value="{{ $edit_promocode->promo_code }}" class="form-control{{ $errors->has('promo_code') ? ' is-invalid' : '' }}" id="exampleCode" placeholder="Code">
                                                    @if ($errors->has('promo_code'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('promo_code') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLastName">Title</label>
                                                    <input type="text" name="promo_title" value="{{ $edit_promocode->promo_title }}" class="form-control{{ $errors->has('promo_title') ? ' is-invalid' : '' }}" id="examplepromo_title" placeholder="Title">
                                                    @if ($errors->has('promo_title'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('promo_title') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleDiscount">Discount</label>
                                                    <input type="text" name="discount" value="  {{ $edit_promocode->discount }} " class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" id="discount" placeholder="Discount">
                                                    @if ($errors->has('discount'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('discount') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLimit_Discount">Limit Per User</label>
                                                    <input type="text" name="limit_per_user" value="{{ $edit_promocode->limit_per_user }}" class="form-control{{ $errors->has('limit_per_user') ? ' is-invalid' : '' }}" id="limit_per_user" placeholder="Limit Per User">
                                                    @if ($errors->has('limit_per_user'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('limit_per_user') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLimit_Discount">Used Count</label>
                                                    <input type="text" name="used_count" value="{{ $edit_promocode->used_count }}" class="form-control{{ $errors->has('used_count') ? ' is-invalid' : '' }}" id="used_count" placeholder="Used Count">
                                                    @if ($errors->has('used_count'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('used_count') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="discount_type">Discount Type</label>
                                                    <select id="discount_type" class="form-control{{ $errors->has('discount_type') ? ' is-invalid' : '' }} custom-select" name="discount_type">
                                                        <option selected disabled>Select</option>
                                                        <option value="percentage">Percentage</option>
                                                        <option value="amount">Amount</option>
                                                    </select>
                                                    @if ($errors->has('discount_type'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('discount_type') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }} custom-select" name="status">
                                                        @if ($edit_promocode->status == 'Active')
                                                        <option value="{{ $edit_promocode->status }}" {{ $edit_promocode->status === $edit_promocode->status? 'Active' : 'Inactive' }}>Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                        @elseif ($edit_promocode->status == 'Inactive')
                                                        <option value="{{ $edit_promocode->status }}" {{ $edit_promocode->status === $edit_promocode->status? 'Inactive' : 'Active' }}>Inactive</option>
                                                        <option value="Active">Active</option>
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('status'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('status') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example_startdate">Start Date</label>
                                                    <input type="date" name="start_date" value="{{ $edit_promocode->start_date }}" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="example_start_date" placeholder="Start Date">
                                                    @if ($errors->has('start_date'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('start_date') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example_enddate">End Date</label>
                                                    <input type="date" name="end_date" value="{{ $edit_promocode->end_date }}" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="example_end_date" placeholder="End Date">
                                                    @if ($errors->has('end_date'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('end_date') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <input type="hidden" name="_id" value="{{ $edit_promocode->_id }}">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                     <?php }  ?>

                    @else

                    <?php 
                    $check_role= Session::get('role');
                    $data = \App\Models\AllDataTableRolesAndPermission::get();
                    foreach($data as $item)
                    {
                     $check_role_name = $item->role_name;
                      foreach ($item->promocode_permissions as $value) 
                      {
                           if($value == 'Add')//Users
                           {
                            $checkAdd = $value;
                            
                            if($check_role == $check_role_name && $checkAdd)
                              { 

                          ?>
                         
                                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Promo Code</small></h3>

                        </div>
                        <!-- /.card-header -->
                        <!--  form start -->
                        <form id="quickForm" action="add_promocode" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFirstName">Code</label>
                                            <input type="text" name="promo_code" class="form-control{{ $errors->has('promo_code') ? ' is-invalid' : '' }}" id="exampleCode" placeholder="Code">
                                            @if ($errors->has('promo_code'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('promo_code') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLastName">Title</label>
                                            <input type="text" name="promo_title" class="form-control{{ $errors->has('promo_title') ? ' is-invalid' : '' }}" id="examplepromo_title" placeholder="Title">
                                            @if ($errors->has('promo_title'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('promo_title') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleDiscount">Discount</label>
                                            <input type="text" name="discount" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" id="discount" placeholder="Discount">
                                            @if ($errors->has('discount'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('discount') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleLimit_Discount">Limit Per User</label>
                                            <input type="text" name="limit_per_user" class="form-control{{ $errors->has('limit_per_user') ? ' is-invalid' : '' }}" id="limit_per_user" placeholder="Limit Per User">
                                            @if ($errors->has('limit_per_user'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('limit_per_user') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount_type">Discount Type</label>
                                            <select id="discount_type" class="form-control{{ $errors->has('discount_type') ? ' is-invalid' : '' }} custom-select" name="discount_type">
                                                <option selected disabled>Select</option>
                                                <option value="percentage">Percentage</option>
                                                <option value="amount">Amount</option>
                                            </select>
                                            @if ($errors->has('discount_type'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('discount_type') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example_startdate">Start Date</label>
                                            <input type="date" name="start_date" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="example_start_date" placeholder="Start Date">
                                            @if ($errors->has('start_date'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('start_date') }}.</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example_enddate">End Date</label>
                                            <input type="date" name="end_date" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="example_end_date" placeholder="End Date">
                                            @if ($errors->has('end_date'))
                                            <span class="invalid feedback" role="alert">
                                                <strong>{{ $errors->first('end_date') }}.</strong>
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


                         
                     <?php }   } } }?>

                     <?php 
                     $check_role= Session::get('status');
             
                             if($check_role == '1')//develeoper mode
                               { 
                           ?>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Promo Code</small></h3>
        
                                </div>
                                <!-- /.card-header -->
                                <!--  form start -->
                                <form id="quickForm" action="add_promocode" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleFirstName">Code</label>
                                                    <input type="text" name="promo_code" class="form-control{{ $errors->has('promo_code') ? ' is-invalid' : '' }}" id="exampleCode" placeholder="Code">
                                                    @if ($errors->has('promo_code'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('promo_code') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLastName">Title</label>
                                                    <input type="text" name="promo_title" class="form-control{{ $errors->has('promo_title') ? ' is-invalid' : '' }}" id="examplepromo_title" placeholder="Title">
                                                    @if ($errors->has('promo_title'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('promo_title') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleDiscount">Discount</label>
                                                    <input type="text" name="discount" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" id="discount" placeholder="Discount">
                                                    @if ($errors->has('discount'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('discount') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleLimit_Discount">Limit Per User</label>
                                                    <input type="text" name="limit_per_user" class="form-control{{ $errors->has('limit_per_user') ? ' is-invalid' : '' }}" id="limit_per_user" placeholder="Limit Per User">
                                                    @if ($errors->has('limit_per_user'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('limit_per_user') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="discount_type">Discount Type</label>
                                                    <select id="discount_type" class="form-control{{ $errors->has('discount_type') ? ' is-invalid' : '' }} custom-select" name="discount_type">
                                                        <option selected disabled>Select</option>
                                                        <option value="percentage">Percentage</option>
                                                        <option value="amount">Amount</option>
                                                    </select>
                                                    @if ($errors->has('discount_type'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('discount_type') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example_startdate">Start Date</label>
                                                    <input type="date" name="start_date" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="example_start_date" placeholder="Start Date">
                                                    @if ($errors->has('start_date'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('start_date') }}.</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example_enddate">End Date</label>
                                                    <input type="date" name="end_date" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="example_end_date" placeholder="End Date">
                                                    @if ($errors->has('end_date'))
                                                    <span class="invalid feedback" role="alert">
                                                        <strong>{{ $errors->first('end_date') }}.</strong>
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



                      <?php }  ?>

                    @endif


                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Promocodes</h3>
                            <!-- <button type="button" class="btn btn-default float-right bg-primary" data-toggle="modal" data-target="#modal-lg">
                                Add Promocode
                            </button> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Title</th>
                                        <th>Discount</th>
                                        <th>Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($promocode as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->promo_code }}</td>
                                        <td>{{ $value->promo_title }}</td>
                                        <td>{{ $value->discount }}</td>
                                        <td>{{ $value->discount_type }}</td>
                                        <td>{{ $value->start_date }}</td>
                                        <td>{{ $value->end_date }}</td>
                                        <td>{{ $value->status }}</td>
                                        <!-- <td>
                                            @if ($value->status == 1)
                                            <span class="label label-success">Active</span>
                                            @else
                                            <span class="label label-danger">Inactive</span>
                                            @endif
                                            @if ($value->status == 0)

                                            <span class="label label-default">Free</span>
                                            @else
                                            <span class="label label-warning">Pending</span>
                                            @endif
                                        </td> -->
                                        <td class="text-center py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <!-- <a href="{{ url('admin/delete_driver', $value->_id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a> -->

                                                        <?php 
                                                            $check_role= Session::get('role');
                                                            $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                            foreach($data as $item)
                                                            {
                                                             $check_role_name = $item->role_name;
                                                              foreach ($item->promocode_permissions as $valueopp) 
                                                              {
                                                                   if($valueopp == 'Edit')//User
                                                                   {
                                                                    $checkAdd = $valueopp;
                                                                    
                                                                    if($check_role == $check_role_name && $checkAdd)
                                                                      { 
                                    
                                                                  ?>
                                                                  <li class="list-unstyled">
                                                                    <a href="{{ url('admin/edit_promocode', $value->_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                  </li>
                                                             <?php }   } } }?>

                                                             <?php 
                                                             $check_role= Session::get('status');
                                                     
                                                                     if($check_role == '1')//Developer
                                                                       { 
                                                                   ?>
                                                                 <li class="list-unstyled">
                                                                    <a href="{{ url('admin/edit_promocode', $value->_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                  </li>
                                                              <?php }  ?>

                                                             <?php 
                                                             $check_role= Session::get('role');
                                                             $data = \App\Models\AllDataTableRolesAndPermission::get();
                                                             foreach($data as $item)
                                                             {
                                                              $check_role_name = $item->role_name;
                                                               foreach ($item->promocode_permissions as $valuedel) 
                                                               {
                                                                    if($valuedel == 'Delete')//User
                                                                    {
                                                                     $checkAdd = $valuedel;
                                                                     
                                                                     if($check_role == $check_role_name && $checkAdd)
                                                                       { 
                                     
                                                                   ?>
                                                                <li class="list-unstyled">
                                                                 <a href="{{ url('admin/delete_promocode', $value->_id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                    </li>
                                                             <?php } }   } } ?>

                                                             <?php 
                                                             $check_role= Session::get('status');
                                                     
                                                                     if($check_role == '1')//Developer
                                                                       { 
                                                                   ?>
                                                                   <li class="list-unstyled">
                                                                    <a href="{{ url('admin/delete_promocode', $value->_id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                       </li>
                                                              <?php }  ?>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->

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