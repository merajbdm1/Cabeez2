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
                        <h1>Role & Permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Role & Permission</li>
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
                                    <h3 class="card-title">All Roles & Permission</h3>
                                    <a type="button" href="{{ url('add_role_permission') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Add Role
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>Role</th>
                                                <th>Permission</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                               
                                                    @foreach ($viewAllPermission as $value)

                                                    <tr>

                                                        <td>{{ $value->role_name }}</td>
                                                       
                                                        <td>Assigned Permissions</td>
                                                        
                                                        <td><a href="{{url('driver_permission_edit/'.$value->_id)}}" class="btn btn-primary" ><i
                                                            class="fas fa-edit"></i></a>
                                                            <a href="{{url('driver_permission_view/'.$value->_id)}}" class="btn btn-danger" ><i
                                                                class="fas  fa-eye"></i></a></td>
                                                    </tr>
                                                   
                                                @endforeach  

                                                
                                            
                                        </tbody>

                                    </table>

                                    <br>
                                   
                                 
                                    {{ $viewAllPermission->links() }}
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
