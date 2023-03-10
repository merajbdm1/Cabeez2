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
                        <h1>Charging Hubs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Charging Hubs</li>
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
                                    <h3 class="card-title">All Hubs</h3>
                                    <a type="button" href="{{ url('add_hub') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Add Hub
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Address</th>
                                                <th>Hub Name</th>
                                                <th>Hub Address</th>
                                                <th>Hub Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($charginglist as $key=>$value)
                                            <tr>
                                            <td>{{ ($charginglist->currentpage()-1) * $charginglist->perpage() + $key + 1 }}</td>
                                                <td>{{$value->address}}</td>
                                                <td>{{$value->hub_name}}</td>
                                                <td>{{$value->hub_address}}</td>
                                                <td>
                                                    @if ($value->hub_status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{url('charging_hub_edit/'.$value->_id)}}" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
                                                    <a href="{{url('charging_hub_delete/'.$value->_id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this item?');"><i class="fas fa-trash"></i></a>
                                                </td>     

                                            @endforeach

                                        </tr>
                                            
                                        </tbody>

                                    </table>

                                    <br>
                                   
                                 
                                    {{ $charginglist->links() }}
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
