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
                <div class="col-sm-12">
                    <h1>Promo Codes</h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Promocode</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<section class="content">
    <div class="card card-primary">
        <div class="card-header">

            <h3 class="card-title">Edit Promo Code</small></h3>
            <a type="button" href="{{ url('promocode') }}" class="btn btn-default float-right bg-primary">
                Back

            </a>
        </div>
        @if ($message = Session::get('PromocodeSuccess'))
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
        <!-- /.card-header -->
        <!--  form start -->
        <form id="quickForm" action="{{ url('edit_post_promocode',$edit_promocode->_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFirstName">Code Type</label>
                            <select name="code_type" id="" class="form-control">
                                <option value="">--Select Type--</option>
                                <option value="General">General</option>
                                <option value="First Timer">First Timer</option>
                                <option value="Happy Hour">Happy Hour</option>
                                <option value="Happy Day">Happy Day</option>
                                <option value="Special">Special</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFirstName">Code</label>
                            <input type="text" name="code" value="{{$edit_promocode->code}}" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" id="exampleCode" placeholder="Code">
                            @if ($errors->has('code'))
                            <span class="invalid feedback" role="alert">
                                <strong>{{ $errors->first('code') }}.</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleLastName">Title</label>
                            <input type="text" name="title" value="{{$edit_promocode->title}}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="exampletitle" placeholder="Title">
                            @if ($errors->has('title'))
                            <span class="invalid feedback" role="alert">
                                <strong>{{ $errors->first('title') }}.</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleDiscount">Discount Type</label>
                            <select name="discount_type" id="" class="form-control">
                                <option value="">--Select Type--</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                                <option value="Percentage % Amount">Percentage % Amount</option>

                            </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleDiscount">Discount</label>
                            <input type="number" name="discount" value="{{$edit_promocode->discount}}" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" id="discount" placeholder="Discount">
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
                            <input type="text" name="limit_per_user" value="{{$edit_promocode->limit_per_user}}" class="form-control{{ $errors->has('limit_per_user') ? ' is-invalid' : '' }}" id="limit_per_user" placeholder="Limit Per User">
                            @if ($errors->has('limit_per_user'))
                            <span class="invalid feedback" role="alert">
                                <strong>{{ $errors->first('limit_per_user') }}.</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleLimit_Discount">Usage Limit</label>
                            <input type="text" name="usage_limit" value="{{$edit_promocode->usage_limit}}" class="form-control{{ $errors->has('usage_limit') ? ' is-invalid' : '' }}" id="usage_limit" placeholder="Usage Limit">
                            @if ($errors->has('usage_limit'))
                            <span class="invalid feedback" role="alert">
                                <strong>{{ $errors->first('usage_limit') }}.</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleLimit_Discount">Max Discount</label>
                            <input type="text" name="max_discount" value="{{$edit_promocode->max_discount}}"class="form-control{{ $errors->has('max_discount') ? ' is-invalid' : '' }}" id="max_discount" placeholder="Max Discount">
                            @if ($errors->has('max_discount'))
                            <span class="invalid feedback" role="alert">
                                <strong>{{ $errors->first('max_discount') }}.</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleLimit_Discount">Code Rule</label>
                            <input type="text" name="code_rule" value="{{$edit_promocode->code_rule}}" class="form-control{{ $errors->has('code_rule') ? ' is-invalid' : '' }}" id="code_rule" placeholder="Code Rule">
                            @if ($errors->has('code_rule'))
                            <span class="invalid feedback" role="alert">
                                <strong>{{ $errors->first('code_rule') }}.</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example_startdate">Start Date</label>
                            <input type="date" name="start_date" value="{{$edit_promocode->start_date}}" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="example_start_date" placeholder="Start Date">
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
                            <input type="date" name="end_date" value="{{$edit_promocode->end_date}}" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="example_end_date" placeholder="End Date">
                            @if ($errors->has('end_date'))
                            <span class="invalid feedback" role="alert">
                                <strong>{{ $errors->first('end_date') }}.</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example_enddate">Term Description</label>
                            <textarea id="summernote" name="term_condition" rows="10">
                                {{$edit_promocode->term_condition}}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example_enddate">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="">--Select Status--</option>
                                <option value="active">Active</option>
                                <option value="inactive">InActive</option>
                            </select>
                        </div>
                    </div>



                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


</section>
</div>


@endsection

@section('script')
<script>
    $(function () {

      $('#summernote').summernote()

      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

@endsection

