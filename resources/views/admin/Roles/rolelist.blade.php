@extends('admin.layout.master')
@section('style')
@endsection
<style>
    nav svg {
        max-height: 10px;
    }
</style>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Assign Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Assign Role</li>
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
                        @if ($message = Session::get('RidesDetailSuccess'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif @if ($message = Session::get('RidesDetailError'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <!-- jquery validation -->

                            <div class="card">




                                <div class="card-header">
                                    <h3 class="card-title">All Roles</h3>
                                    <a type="button" href="{{ url('add_role') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Add Assign Role
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($viewrole as $key=>$value)
                                            <tr>
                                            <td>{{ ($viewrole->currentpage()-1) * $viewrole->perpage() + $key + 1 }}</td>
                                            <td>{{ $value->name}}</td>
                                            <td>{{ $value->email}}</td>
                                           
                                            <td>{{ $value->role}}</td>

                                               
                                                <td><a href="{{url('user_role_edit/'.$value->_id)}}" class="btn btn-primary" ><i class="fas fa-edit"></i></a></td>     

                                            @endforeach

                                        </tr>
                                            
                                        </tbody>

                                    </table>

                                    <br>
                                   
                                 
                                    {{ $viewrole->links() }}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
