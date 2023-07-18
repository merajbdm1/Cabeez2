
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

                                    <div class="col-md-12">


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example_enddate">Description</label>
                                                <textarea id="form7" class="md-textarea form-control" rows="3" name="description"></textarea>
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleLastName">Status <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" id="cars">
                                            <option value="">--Select Status--</option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>

                                            </select>
                                        </div>

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


@section('script')
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

@endsection
