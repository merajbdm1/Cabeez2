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
                        <h1>FARE</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">FARE</li>
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
                            @endif @if ($message = Session::get('DriverDetailError'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <!-- jquery validation -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">All FARE</h3>
                                    <a type="button" href="{{ url('add_fare_setting') }}"
                                        class="btn btn-default float-right bg-primary">
                                        Add FARE
                                    </a>
                                </div>
                                <div class=" row p-3">
                                    <div class="col-md-4">

                                        {{-- <form action="{{ route('search') }}" method="GET">
                                            <div class="form_group">
                                                <label for="">From Date</label>
                                                <input type="date" name="fromDate" value="{{ request('fromDate') }}"
                                                    class="form-control" placeholder="dd/mm/yyyy">
                                            </div>
                                            <br>
                                            <div class="form_group">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                                <a href="{{ url('fare_view_setting') }}" class="btn btn-primary">Clear</a>
                                            </div>
                                                    </div>
                                                    <div class=" col-md-4">
                                                            <div class="form_group">

                                                                <label for="">To Date</label>
                                                                <input type="date" name="toDate" value="{{ request('toDate') }}"
                                                                    class="form-control" placeholder="dd/mm/yyyy">

                                                            </div>



                                                    </div>

                                                  <div class="col-md-4">


                                                 <div class="form_group">


                                                <label for="">Search Here</label>
                                                <input type="text" name="search" value="{{ request('search') }}"
                                                    class="form-control" placeholder="Enter Vehicle Category....">
                                                </div>

                                        </form> --}}

                                    </div>
                                </div>



                                <!-- /.card-header -->
                                <div class="card-body">
                                    {{-- @if(count($fareview)>0) --}}

                                    <table class="table table-bordered table-striped " id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>VEHICHLE CATEGORY</th>
                                                <th>BASE FARE </th>
                                                <th>MINIMUM FARE</th>
                                                <th>PER MINUTE FARE</th>
                                                <th>RATE PER KM (0 < 25 KMS)</th>
                                                <th>RATE PER KM (25 TO 50 KMS)</th>
                                                <th>RATE PER KM (50 TO 100 KMS)</th>
                                                <th>RATE PER KM (100 TO 250 KMS)</th>
                                                <th>RATE PER KM (250 TO 500 KMS)</th>
                                                <th>RATE PER KM (500 + KMS)</th>
                                                <th>MINIMUM FARE KM</th>
                                                <th>STATUS</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>
                                                <th>ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($fareview as $key=>$fare)
                                                <tr>
                                                    <td>{{ ($fareview->currentpage()-1) * $fareview->perpage() + $key + 1 }}</td>

                                                    <td>{{ isset($fare->categories->name)?$fare->categories->name:null}}</td>
                                                    <td>&#8377; {{ $fare->base_fare }} </td>
                                                    <td>&#8377; {{ $fare->minimum_fare }}</td>
                                                    <td>&#8377; {{ $fare->per_min_fare }}</td>
                                                    <td>&#8377; {{ $fare->per_km_fare_slab1 }}</td>
                                                    <td>&#8377; {{ $fare->per_km_fare_slab2 }}</td>

                                                    <td>&#8377; {{ $fare->per_km_fare_slab3 }}</td>
                                                    <td>&#8377; {{ $fare->per_km_fare_slab4 }}</td>
                                                    <td>&#8377; {{ $fare->per_km_fare_slab5 }}</td>
                                                    <td>&#8377; {{ $fare->per_km_fare_slab6 }}</td>
                                                    <td>&#8377; {{ $fare->minimum_fare_km }}</td>

                                                    <td>
                                                        @if ($fare->status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td> {{ $fare->created_at }}</td>
                                                    <td> {{ $fare->updated_at }}</td>
                                                    <td class="text-center py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ url('edit_fare_view_setting/' . $fare->_id) }}"
                                                                class="btn btn-primary"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <a href="{{ url('delete_fare_view_setting/' . $fare->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this Fare?');">
                                                                <i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                         {{-- @else

                                        <h3>No Result found</h3>
                                        @endif --}}
                                    <br>

                                    {{-- //{{ $fareview->links() }} --}}
                                    {{-- {{ $fareview->appends(['sort'=>'date'])->links() }} --}}

                                    {{-- {{ $fareview->appends(Request::all())->links() }} --}}
                                    {{-- @if (isset($fareview))
                                    {{ $fareview->appends($fareview)->links() }}
                                    @else --}}
                                    {{ $fareview->links() }}
                                    {{-- @endif --}}
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
